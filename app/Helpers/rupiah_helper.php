<?PHP
if(!function_exists("toRupiah"))
{
    function toRupiah($value)
    {
        $rp = "Rp " . number_format($value,2,',','.');
        return $rp;
    }
}