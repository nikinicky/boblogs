<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
  protected $fillable = array('title', 'done');


  /**
   * Task from a user
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public static function user()
  {
    return $this->belongsTo('App/User');
  }
  
}
