<?php
namespace App\Session;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use App\Entity\User;

class DataSource{
    private $current_user;

    function __construct(){
    }

    public function setUser(User $u, EntityManagerInterface $em){
        $filesystem = new Filesystem();
        $filesystem->dumpFile("user.txt", $u->getId());   
    }

    public function getUser(EntityManagerInterface $em) : User{
        $s = $file_lines = $filesystem->exists("user.txt") ? file("user.txt") : [];
        if($s){
            return $em->getRepository(User::class)->find($s[0]);
        } else {
            return null;
        }
    }

    public function logOff(){
        $filesystem = new Filesystem();
        $filesystem->dumpFile("user.txt", "");   
    }

    public function getUserState() : bool{
        $s = $file_lines = $filesystem->exists("user.txt") ? file("user.txt") : [];
        if($s){
            return true;
        } else {
            return false;
        }
    }
}
?>