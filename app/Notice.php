<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    
	/**
     * Fillable fields for a Notice
     *
     * @var array
     */
	protected $fillable = [
		'user_id',
		'provider_id',
		'infringing_title',
		'infringing_link',
		'original_link',
		'original_description',
		'template',
		'content_removed'
	];

	/**
	 * Email template
	 * 
	 * @var string
	 */
	protected $template;

	/**
	 * Open new notice
	 *
	 * @param	array $attributes
	 * @return	Notice
	 */  
    public static function open(array $attributes )
    {
    	return new static( $attributes ); // new Notice($attributes)
    }

    /**
     * Set the email template
     *
     * @param	String $template
     * @return	Notice
     */  
    public function useTemplate( $template )
    {
    	$this->template = $template;

    	return $this;
    }

}
