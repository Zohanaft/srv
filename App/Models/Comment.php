<?php
namespace App\Models;

use App\Core\Model;

class Comment extends Model {
    
    public function getComment() {
        return $this->db->row("SELECT * FROM comment_system WHERE is_valid='1' ORDER BY dt DESC LIMIT 50");
    }

    public function setComment($args) {

        $array = [
            "firstname" => $args["firstname"],
            "surname"   => $args["surname"],
            "lastname"  => $args["lastname"],
            "mail"      => $args["mail"],
            "coment"    => $args["coment"]
        ];
        $this->db->query("INSERT INTO comment_system SET firstname= :firstname, surname= :surname, lastname= :lastname, mail= :mail, com_text= :coment, is_valid='1';", $array);
    }

}


?>