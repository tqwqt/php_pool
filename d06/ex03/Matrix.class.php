<?php

require_once '../ex02/Vector.class.php';
class Matrix{

    const IDENTITY = 'IDENTITY';
    const SCALE = 'SCALE';
    const RX = 'RX';
    const RY = 'RY';
    const RZ = 'RZ';
    const TRANSLATION = 'TRANSLATION';
    const PROJECTION = 'PROJECTION';
    public static $verbose = false;
    private $matrix;


    public function __construct($arr)
    {
        $ret = Matrix::IDENTITY;
        $this->matrix_init();
        if ($arr['preset'] == 'SCALE')
        {
            if ($arr['scale'])
            {
                $k = $arr['scale'];
                $ret = Matrix::SCALE;

                $xold_x = $this->matrix['x']->getX();
                $xold_y = $this->matrix['x']->getY();
                $xold_z = $this->matrix['x']->getZ();

                $yold_x = $this->matrix['y']->getX();
                $yold_y = $this->matrix['y']->getY();
                $yold_z = $this->matrix['y']->getZ();

                $zold_x = $this->matrix['z']->getX();
                $zold_y = $this->matrix['z']->getY();
                $zold_z = $this->matrix['z']->getZ();

                $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                $this->matrix['x'] = new Vector(array('dest' => new Vertex(array('x' => $xold_x * $k, 'y' => $xold_y*$k, 'z' => $xold_z*$k, 'w' => 1.0))));
                $this->matrix['y'] = new Vector(array('dest' => new Vertex(array('x' => $yold_x *$k, 'y' => $yold_y * $k, 'z' => $yold_z * $k, 'w' => 1.0))));
                $this->matrix['z'] = new Vector(array('dest' => new Vertex(array('x' => $zold_x * $k, 'y' => $zold_y*$k, 'z' => $zold_z * $k, 'w' => 1.0))));

            }

        }
        if ($arr['preset'] == 'RX' || $arr['preset'] == 'RY' || $arr['preset'] == 'RZ')
        {
            if ($arr['angle'])
            {
                $angle = $arr['angle'];
                if ($arr['preset'] == Matrix::RX)
                {
                    $ret = 'Ox ROTATION';
                    $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                    $new_y = new Vector(array('dest' => new Vertex(array('x' => 0.0, 'y' => cos($angle), 'z' => sin($angle), 'w' => 1.0)), 'orig' => $orig));
                    $new_z = new Vector(array('dest' => new Vertex(array('x' => 0.0, 'y' => sin($angle) * (-1), 'z' => cos($angle), 'w' => 1.0)), 'orig' => $orig));
                    $this->matrix['y'] = $new_y;
                    $this->matrix['z'] = $new_z;
                }
                if ($arr['preset'] == Matrix::RY)
                {
                    $ret = 'Oy ROTATION';
                    $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                    $new_x = new Vector(array('dest' => new Vertex(array('x' => cos($angle), 'y' => 0.0, 'z' => sin($angle) * (-1), 'w' => 1.0)), 'orig' => $orig));
                    $new_z = new Vector(array('dest' => new Vertex(array('x' => sin($angle), 'y' => 0.0, 'z' => cos($angle), 'w' => cos($angle))), 'orig' => $orig));
                    $this->matrix['x'] = $new_x;
                    $this->matrix['z'] = $new_z;
                }
                if ($arr['preset'] == Matrix::RZ)
                {
                    $ret = 'Oz ROTATION';
                    $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                    $new_x = new Vector(array('dest' => new Vertex(array('x' => cos($angle), 'y' => sin($angle), 'z' => 0.0, 'w' => 1.0)), 'orig' => $orig));
                    $new_y = new Vector(array('dest' => new Vertex(array('x' => sin($angle) * (-1), 'y' => cos($angle), 'z' => 0.0, 'w' => 1.0)), 'orig' => $orig));
                    $this->matrix['x'] = $new_x;
                    $this->matrix['y'] = $new_y;
                }
            }

        }
        if ($arr['preset'] == 'TRANSLATION')
        {
            if ($arr['vtc'])
            {
                $ret = Matrix::TRANSLATION;
                $vector = $this->matrix['w'];
                $vtc = $arr['vtc'];
                $vtxO = new Vertex( array( 'x' => $vector->getX() + $vtc->getX() , 'y' => $vector->getY() + $vtc->getY(), 'z' => $vector->getZ() + $vtc->getZ() ) );
                $vertex = new Vector(array('dest' => $vtxO));
                $this->matrix['w'] = $vertex;
            }

        }
        if ($arr['preset'] == 'PROJECTION')
        {
            if ($arr['fov'] && $arr['ratio'] && $arr['near'] && $arr['far'] )
            {
                $ret = Matrix::PROJECTION;
                $fov = $arr['fov'];
                $ratio = $arr['ratio'];
                $near = $arr['near'];
                $far = $arr['far'];
                $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
                $new_x = new Vector(array('dest' => new Vertex(array('x' => (1 / ($ratio * (tan($fov / 2 * M_PI / 180)))), 'y' => 0.0, 'z' => 0.0, 'w' => 1.0)), 'orig' => $orig));
                $new_y = new Vector(array('dest' => new Vertex(array('x' => 0.0, 'y' => 1 / tan($fov / 2 * M_PI / 180), 'z' => 0.0, 'w' => 1.0)), 'orig' => $orig));
                $new_z = new Vector(array('dest' => new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => ((-1) * (($far + $near)/($far - $near))), 'w' => 0.0)), 'orig' => $orig));
                $new_w = new Vector(array('dest' => new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => ((-1) * ((2 * $far * $near)/($far - $near))), 'w' => 1.0)), 'orig' => $orig));
                $this->matrix['x'] = $new_x;
                $this->matrix['y'] = $new_y;
                $this->matrix['z'] = $new_z;
                $this->matrix['w'] = $new_w;
            }

        }
        if (Matrix::$verbose)
        {
            if($arr['preset'] !== Matrix::IDENTITY) {
                echo "Matrix $ret preset instance constructed\n";
            }
            else {
                echo "Matrix $ret instance constructed\n";
            }
        }
    }
    public function __toString()
    {
        return $this->print_matrix($this->matrix);
    }

    private function matrix_init()
    {
        $vtxW = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 , 'w' => 1.0) );
        $vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 , 'w' => 1.0 ));
        $vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0  , 'w' => 1.0 ));
        $vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 , 'w' => 1.0 ));
        $vtcXunit = new Vector( array(  'dest' => $vtxX ) );
        $vtcYunit = new Vector( array(  'dest' => $vtxY ) );
        $vtcZunit = new Vector( array(  'dest' => $vtxZ ) );
        $vtcWunit = new Vector( array(  'dest' => $vtxW , 'orig' => new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 , 'w' => 0.0) )) );
        $this->matrix = array('x' => $vtcXunit, 'y' => $vtcYunit, 'z' => $vtcZunit, 'w' =>  $vtcWunit);
    }
    private function print_matrix(array  $matrix)
    {
      $s1 = sprintf("M | vtcX | vtcY | vtcZ | vtxO\n"."-----------------------------\n");
      $s2 = sprintf("x | %.2f | %.2f | %.2f | %.2f\n",$matrix['x']->getX(),$matrix['y']->getX(),$matrix['z']->getX(), $matrix['w']->getX());
      $s3 = sprintf("y | %.2f | %.2f | %.2f | %.2f\n",$matrix['x']->getY(),$matrix['y']->getY(),$matrix['z']->getY(), $matrix['w']->getY());
      $s4 = sprintf("z | %.2f | %.2f | %.2f | %.2f\n",$matrix['x']->getZ(),$matrix['y']->getZ(),$matrix['z']->getZ(), $matrix['w']->getZ());
      $s5 = sprintf("w | %.2f | %.2f | %.2f | %.2f",$matrix['x']->getW(),$matrix['y']->getW(),$matrix['z']->getW(), $matrix['w']->getW());
      return $s1.$s2.$s3.$s4.$s5;
    }
    public static function doc()
    {
        return file_get_contents("Matrix.doc.txt");
    }
    public function mult(Matrix $rhs)
    {

        $a11 = $this->matrix['x']->getX();
        $a21 = $this->matrix['x']->getY();
        $a31 = $this->matrix['x']->getZ();

        $a12 = $this->matrix['y']->getX();
        $a22 = $this->matrix['y']->getY();
        $a32 = $this->matrix['y']->getZ();

        $a13 = $this->matrix['z']->getX();
        $a23 = $this->matrix['z']->getY();
        $a33 = $this->matrix['z']->getZ();

        $b11 = $rhs->matrix['x']->getX();
        $b21 = $rhs->matrix['x']->getY();
        $b31 = $rhs->matrix['x']->getZ();

        $b12 = $rhs->matrix['y']->getX();
        $b22 = $rhs->matrix['y']->getY();
        $b32 = $rhs->matrix['y']->getZ();

        $b13 = $rhs->matrix['z']->getX();
        $b23 = $rhs->matrix['z']->getY();
        $b33 = $rhs->matrix['z']->getZ();
        $orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
        $new_x = new Vector(array('dest' => new Vertex(array('x' => ($a11 * $b11 + $a12*$b21+$a13*$b31), 'y' => ($a21*$b11+$a22*$b21+$a23*$b31), 'z' => ($a31*$b11+$a32*$b21+$a33*$b31), 'w' => 1.0)), 'orig' => $orig));
        $new_y = new Vector(array('dest' => new Vertex(array('x' => ($a11*$b12+$a12*$b22+$a13*$b32), 'y' => ($a21*$b12+$a22*$b22+$a23*$b32), 'z' => ($a31*$b12+$a32*$b22+$a33*$b32), 'w' => 1.0)), 'orig' => $orig));
        $new_z = new Vector(array('dest' => new Vertex(array('x' => ($a11*$b13+$a12*$b23+$a13*$b33), 'y' => ($a21*$b13+$a22*$b23+$a23*$b33), 'z' => ($a31*$b13+$a32*$b23+$a33*$b33), 'w' => 1.0)), 'orig' => $orig));
        $this->matrix['x'] = $new_x;
        $this->matrix['y'] = $new_y;
        $this->matrix['z'] = $new_z;
        $this->matrix['w'] = $new_z;
        $rhs->__destruct();
        return $this;
    }
    public function transformVertex(Vertex $vtx)
    {
        $nx = ($this->matrix['x']->getX() * $vtx->getX() + $this->matrix['y']->getX() * $vtx->getY() + $this->matrix['z']->getX() * $vtx->getZ() + $this->matrix['w']->getX() * $vtx->getW());
        $ny = ($this->matrix['x']->getY() * $vtx->getX() + $this->matrix['y']->getY() * $vtx->getY() + $this->matrix['z']->getY() * $vtx->getZ() + $this->matrix['w']->getY() * $vtx->getW());
        $nz = ($this->matrix['x']->getZ() * $vtx->getX() + $this->matrix['y']->getZ() * $vtx->getY() + $this->matrix['z']->getZ() * $vtx->getZ() + $this->matrix['w']->getZ() * $vtx->getW());
        $nw = ($this->matrix['x']->getW() * $vtx->getX() + $this->matrix['y']->getW() * $vtx->getY() + $this->matrix['z']->getW() * $vtx->getZ() + $this->matrix['w']->getW() * $vtx->getW());
        return new Vertex(array('x' => $nx, 'y' => $ny, 'z' => $nz, 'w' => $nw));
    }

    public function __destruct()
    {
        if (Matrix::$verbose === true)
            print("Matrix instance destructed". PHP_EOL);
    }

}

?>

