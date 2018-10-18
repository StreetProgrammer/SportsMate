<?php
namespace App\Model ;

//use App\QueryFiltter;
/**
 * 
 */
class PlayerFilters extends QueryFilter
{

	public $phone ;

	public $sport ;

	public $p_gender ;

	public $p_preferred_gender ;

	public function type($type)
	{
		return $this->builder->where('type', '=', $type) ;
	}

	public function name($name)
	{
		return $this->builder->where('name', 'LIKE', '%'.$name.'%') ;
	}

	public function sport($sport)
	{
		$this->sport = $sport ;
		return $this->builder->whereHas('sports', function ($lquery) {
		    $lquery->where('id', '=', $this->sport);
		}) ;
	}

	public function preferred_gender($p_gender)
	{   
		$this->p_preferred_gender = $p_gender ;
		return $this->builder->whereHas('playerProfile', function ($lquery) {
		    $lquery->where('p_preferred_gender', '=', $this->p_preferred_gender);
		}) ;
	}

	public function gender($gender)
	{   
		$this->p_gender = $gender ;
		return $this->builder->whereHas('playerProfile', function ($lquery) {
		    $lquery->where('p_gender', '=', $this->p_gender);
		}) ;
	}

	/*public function phone($phone)
	{   
		$this->phone = $phone ;
		return $this->builder->whereHas('playerProfile', function ($lquery) {
		    $lquery->where('p_phone', '=', $this->phone);
		}) ;
	}*/
}
