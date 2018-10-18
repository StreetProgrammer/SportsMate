<?php
namespace App\Model ;

//use App\QueryFiltter;
/**
 * 
 */
class PlaygroundFilters extends QueryFilter
{

     
    public $name ; public $sport ;public $city ;public $area ;public $from ;public $to ;
    public $feature1 ;public $feature2 ;public $feature3 ;public $feature4 ;
    public $feature5 ;public $feature6 ;public $feature7 ;public $feature8 ; 

    /* 
    * always call this function
    */
	public function type($type)
	{
		return $this->builder->where('type', '=', $type) ;
	}

	public function name($name)
	{
		return $this->builder->where('c_b_p_name', 'LIKE', '%'.$name.'%') ;
	}

	public function sport($sport)
	{
	    $sport ;
        return $this->builder->where('c_b_p_sport_id', $sport) ;	
	}

	public function city($city)
	{   
        $this->city = $city ;
        return $this->builder->where('c_b_p_city', $this->city) ;
    }
    
    public function area($area)
	{   
        $this->area = $area ;
        return $this->builder->where('c_b_p_area', $this->area) ;
	}

	public function from($from)
	{   
        $this->from = $from ;
        return $this->builder->where('c_b_p_price_per_hour', '>=', intval($this->from)) ;
    }
    
    public function to($to)
	{   
        $this->to = $to ;
        return $this->builder->where('c_b_p_price_per_hour', '<=', intval($this->to)) ;
	}

    public function feature1($feature1)
	{   
		$this->feature1 = $feature1 ;
		return $this->builder->where('feature1', $this->feature1) ;
    }
    
    public function feature2($feature2)
	{   
		$this->feature2 = $feature2 ;
		return $this->builder->where('feature2', $this->feature2) ;
    }
    
    public function feature3($feature3)
	{   
		$this->feature3 = $feature3 ;
		return $this->builder->where('feature3', $this->feature3) ;
    }
    
    public function feature4($feature4)
	{   
		$this->feature4 = $feature4 ;
		return $this->builder->where('feature4', $this->feature4) ;
    }
    
    public function feature5($feature5)
	{   
		$this->feature5 = $feature5 ;
		return $this->builder->where('feature5', $this->feature5) ;
    }
    
    public function feature6($feature6)
	{   
		$this->feature6 = $feature6 ;
		return $this->builder->where('feature6', $this->feature6) ;
    }
    
    public function feature7($feature7)
	{   
		$this->feature7 = $feature7 ;
		return $this->builder->where('feature7', $this->feature7) ;
    }
    
    public function feature8($feature8)
	{   
		$this->feature8 = $feature8 ;
		return $this->builder->where('feature8', $this->feature8) ;
	}
}
