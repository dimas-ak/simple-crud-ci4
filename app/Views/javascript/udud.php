<script type="text/javascript">
    var harga_udud      = document.getElementById("harga-udud"),
        delete_image    = document.getElementsByClassName("delete-image"),
        span_harga      = document.getElementById("rp-udud");

    span_harga.innerHTML = toRupiah(harga_udud.value);

    harga_udud.addEventListener("keyup", function () {
        span_harga.innerHTML = toRupiah(this.value);
    });

    for(var di = 0; di < delete_image.length; di++)
    {
        delete_image[di].addEventListener("click", function (x) {
            var parent  = this.parentElement,
                url     = this.getAttribute("href");
            //this.parentElement.remove()
            x.preventDefault();
            if(confirm("Apakah Anda yakin ingin menghapus Photo tersebut?"))
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        var json = JSON.parse(this.responseText);
                        if(json.result)
                        {
                            parent.remove();
                        }
                        else
                        {
                            alert("Ops! Terjadi kesalahan, harap dicoba kembali.");
                        }
                    }
                };
                xhttp.open("GET", url, true);
                xhttp.send();
            }
        });
    }

    function toRupiah(value)
    {
        if(value.length === 0) return "Rp. 0,-";

        var reverse = value.toString().split('').reverse().join(''),
            match   = reverse.match(/\d{1,3}/g);
            result  = match.join('.').split('').reverse().join('');

        return "Rp. " + result + ",-";
    }
</script>