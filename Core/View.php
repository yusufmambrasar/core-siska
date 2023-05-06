<?php
defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

class View
{

    private string $_layout;
    private $_data = [];
    
    public function __construct( $layout = '' )
    {
        if(!empty($layout))
        {
            $this->_layout = $layout;
        }
    }

    public function set( $name , $value )
    {
        $this->_data[ $name ] = $value;
		return $this;
    }

    public function unset( $name )
    {
        unset( $this->_data[ $name ] );
		return $this;
    }

    public function assign( $name , $value )
    {
        $this->{ $name } = $value;
		return $this;
    }

    public function unassign( $name  )
    {
        unset( $this->{ $name } );
		return $this;
    }

    public function part ( $name , $view )
    {
        $file = BASE . $view . '.php';
        $this->assign( $name , $this->_load( $view ) ) ;
        return $this;
    }

    public function unpart ( $name )
    {
        $this->unassign( $name );
        return $this;
    }

    public function render( $view )
    {
        $this->part( 'content' , $view );
        echo $this->_load( $this->_layout );
    }

    private function _load( $view )
    {
        $file = BASE . $view . '.php';
        $buffer = '';
        if( file_exists( $file ) )
        {
            ob_start();
            if(is_array($this->_data))
            {
                foreach($this->_data as $k => $v)
                {
                    $$k = $v;
                }
            }
            include ( $file );
            $buffer = ob_get_contents();
            ob_end_clean();
        }
        return $buffer;
    }

}