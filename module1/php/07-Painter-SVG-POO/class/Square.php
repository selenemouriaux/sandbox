<?php 

class Square extends Rectangle {

    /**
     * Setter pour les dimensions du carré
     */
    public function setSize(int $size, $useless = null)
    {
        $this->width = $size;
        $this->height = $size;
    }
}