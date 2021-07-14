<?php

interface Kalkulator
{
    public function cal();
}

class Satuan
{
    public  $panjang = "panjang",
            $lebar = "lebar",
            $phi = "phi",
            $rusuk = "rusuk",
            $jari = "jari",
            $tinggi = "tinggi";
    
    public function __construct($panjang, $lebar, $phi, $rusuk, $jari, $tinggi)
    {
        $this -> panjang = $panjang;
        $this -> lebar = $lebar;
        $this -> phi = $phi;
        $this -> rusuk = $rusuk;
        $this -> tinggi = $tinggi;
    }
}

class L_PersegiP implements Kalkulator
{
    public $panjang;
    public $lebar;
    public function cal()
    {
        return $this->panjang * $this->lebar;
    }
}

class V_Bola implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return (4/3) * $this->phi * $this->jari * $this->jari;
    }
}

class V_Kerucut implements Kalkulator
{
    public $tinggi;
    public $jari;
    public $phi;
    public function cal()
    {
        return (1/3) * $this->phi * $this->jari * $this->jari * $this->jari * $this->tinggi;
    }
}

class V_Kubus implements Kalkulator
{
    public $rusuk;
    public function cal()
    {
        return $this->rusuk * $this->rusuk * $this->rusuk;
    }
}

class K_Lingkaran implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return 2 * $this->phi * $this->jari;
    }
}

class BangunRuangFactory
{
    public function initializeBangunRuang($type, $satuan)
    {
        if ($type === 'lpersegip') {
            $data = new L_PersegiP();
            $data -> panjang = $satuan['panjang'];
            $data -> lebar = $satuan['lebar'];

            echo "Panjang : ", $satuan['panjang'], "<br>";
            echo "Lebar : ", $satuan['lebar'], "<br>";
            echo "Luas Persegi Panjang : ";
            return $data;
        }
        if ($type == 'vbola') {
            $data = new V_Bola();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];

            echo "phi : ", $satuan['panjang'], "<br>";
            echo "Lebar : ", $satuan['lebar'], "<br>";
            echo "Volume Bola : ";
            return $data;
        }
        if ($type === 'vkerucut') {
            $data = new V_Kerucut();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];
            $data -> tinggi = $satuan['tinggi'];

            echo "phi : ", $satuan['phi'], "<br>";
            echo "Jari : ", $satuan['jari'], "<br>";
            echo "Tinggi : ", $satuan['tinggi'], "<br>";
            echo "Volume Kerucut : ";
            return $data;
        }
        if ($type === 'vkubus') {
            $data = new V_Kubus();
            $data -> rusuk = $satuan['rusuk'];

            echo "Rusuk : ", $satuan['rusuk'], "<br>";
            echo "Volume Kubus : ";
            return $data;
        }
        if ($type === 'klingkaran') {
            $data = new K_Lingkaran();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];

            echo "phi : ", $satuan['phi'], "<br>";
            echo "Jari : ", $satuan['jari'], "<br>";
            echo "Keliling Lingkaran : ";
            return $data;
        }

        throw new Exception("Try Again Slur!!!");
    }
}

$pilihan = 'vkubus';
$satuan = ['rusuk' => 12, 'panjang'=> 10, 'lebar'=> 4, 'jari'=> 10, 'tinggi'=> 12, 'phi' => 3.14];

$bangunRuangFactory = new BangunRuangFactory();
$bangunRuang = $bangunRuangFactory->initializeBangunRuang($pilihan, $satuan);
//$hasil = $bangunRuang -> hitungBangunRuang();
//print_r($hasil);
print_r($bangunRuang->cal());

?>