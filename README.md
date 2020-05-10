# Simple CRUD (with Multiple Files Uploads) with CodeIgniter 4 Framework

Username : arjunane

Password : admin

I have mofidy few script at **Validation.php** and **OpenSSLHandler.php**

On **Validation.php**
### add function setErrorDelimiters(String $first_tag, String $last_tag)
```PHP
    public function setErrorDelimiters($first_tag, $last_tag) : array
    {
        $this->errorDelimiters[0] = $first_tag;

        $this->errorDelimiters[1] = $last_tag;

        return $this->errorDelimiters;
    }
```

### modify function getError()
```PHP
    public function getError(string $field = null): string
    {
        $errorMessages = [ "" , "" ];

        if ($field === null && count($this->rules) === 1)
        {
            reset($this->rules);
            $field = key($this->rules);
        }
        
        if(count($this->errorDelimiters) != 0)
        {
            $errorMessages[0] = $this->errorDelimiters[0];
            $errorMessages[1] = $this->errorDelimiters[1];
        }

        return array_key_exists($field, $this->getErrors()) && !empty($_REQUEST) ? $errorMessages[0] . $this->errors[$field] . $errorMessages[1] : '';
    }
```

On **OpenSSLHandler.php**

### modify function decrypt()
```PHP
    public function decrypt(string $field = null)
    {
        // ...
        if (! hash_equals($hmacKey, $hmacCalc))
        {
            //throw EncryptionException::forAuthenticationFailed();
            return FALSE;
        }
        // ...
    }
```