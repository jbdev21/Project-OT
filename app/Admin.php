<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{

    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function note()
    {
        return $this->hasMany(Note::class);
    }

    function classer()
    {
        return $this->hasMany(Classer::class);
    }

    function session()
    {
        return $this->hasMany(ClassSession::class);
    }

    public function leveltest()
   {
        return $this->hasMany(LevelTest::class);
   }

   public function subclass()
   {
        return $this->hasMany(ClassSession::class, 'sub_id');
   }

   public function team()
   {
        return $this->belongsTo(Team::class);
   }


   public function blogs()
   {
      return $this->hasMany(Blog::class);
   }


   public function replies()
   {
      return $this->hasMany(Reply::class);
   }

   public function leveltests()
   {
     return $this->hasMany(LevelTest::class);
   }    

   public function testimonials()
   {
       return $this->hasMany(Testimonial::class);
   }


   function proofreading()
    {
        return $this->hasMany(ProofReading::class);
    } 

    function comments()
    {
      return $this->hasMany(Comment::class);
    }

    function messages()
    {
      return $this->hasMany(Message::class);
    }


    /**
      @return Array of id
    */
    public function students()
    {
        /*
         * @return students id
        */
        return self::classer()->with('user')->groupBy('user_id')->pluck('user_id');
    }

    public function level_test_mistake()
    {
        return $this->hasMany(LevelTestMistake::class);
    }
}
