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
	 * A notice belongs to a recipient/provider
	 *
	 * @return	Illuminate\Database\Eloquent\Relations\BelongsTo
	 */  
	public function recipient()
	{
		return $this->belongsTo('App\Provider', 'provider_id');
	}

	/**
	 * A notice belongs to a user
	 *
	 * @return	Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
    {
    	return $this->belongsTo('App\User');
    }    

	/**
	 * Get the email address for the recipient of the DMCA notice
	 *
	 * @return	string
	 */  
	public function getRecipientEmail()
	{
		return $this->recipient->copyright_email;
	}

	/**
	 * Get the owner email
	 *
	 * @return	string
	 */
	public function getOwnerEmail()
  	{
  		return $this->user->email;
  	}   
	
	

	
	
	


}
