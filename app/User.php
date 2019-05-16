<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Book;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'korean_name',
        'contact_number',
        'contact_number1',
        'dob',
        'gender',
        'remarks',
        'is_leveltest',
        'discount_amount',
        'discount_type',
        'image',
        'last_login',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
    * return array of admin ids
    */
    public function teachers()
    {
        return  self::classer()->with('admin')->groupBy('admin_id')->pluck('admin_id');
    }

    public function activeTeachers($year)
    {
        return  self::classer()->whereHas('classSession', function($query) use ($year){
                    $query->whereYear('date_time', $year)->where('status', '!=', 'postponed');
                })
                ->groupBy('admin_id')->pluck('admin_id');
    }


    public function getNumber()
    {
        $phones = "";
        $phones .=  $this->contact_number . "<br>";

        if($this->contact_number1)
        {
            $phones .= $this->contact_number1;
        }else{
            $phones .= 'n/a';
        }
        return $phones;
    }
    

    function classer()
    {
        return $this->hasMany(Classer::class);
    }

    function classSession()
    {
        return $this->hasManyThrough(ClassSession::class, Classer::class);
    }

    function leveltest()
    {
        return $this->hasMany(LevelTest::class);
    }


    function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    function messages()
    {
        return $this->hasMany(Message::class);
    }   

    function proofreading()
    {
        return $this->hasMany(ProofReading::class);
    } 

    function comments()
    {
        return $this->hasMany(Comment::class);
    }


    function getLastSession()
    {
        return self::classSession()->where('class_sessions.status','!=', 'postponed')->orderBy('date_time', 'DESC')->first();
    }   

    function getFirstSession()
    {
        return self::classSession()->where('class_sessions.status','!=', 'postponed')->orderBy('date_time', 'ASC')->first();
    }

    //Ratings
    function monthRate($month, $status = 'present', $attribute = false){
        $sessions = $this->classSession()->where("date_time",'LIKE', '%' . $month . '%')->where("class_sessions.status", $status);
        if($sessions->count()){
            $comprehensions  = $sessions->avg("comprehension");
            $pronounciation =  $sessions->avg("pronounciation");
            $fluency =  $sessions->avg("fluency");
            $vocabulary =  $sessions->avg("vocabulary");
            $grammar =  $sessions->avg("grammar");

            $overall = $comprehensions + $pronounciation + $fluency + $vocabulary + $grammar;
            $overall = $overall ? $overall : 0;

            if($attribute){
                return [
                    'comprehension'     => $comprehensions,
                    'pronounciation'    => $pronounciation,
                    'fluency'           => $fluency,
                    'vocabulary'        => $vocabulary,
                    'grammar'           => $grammar,
                    'comprehension_total'     => $sessions->sum("comprehension"),
                    'pronounciation_total'    => $sessions->sum("pronounciation"),
                    'fluency_total'           => $sessions->sum("fluency"),
                    'vocabulary_total'        => $sessions->sum("vocabulary"),
                    'grammar_total'           => $sessions->sum("grammar"),
                    'overall'           => round($overall / 5)
                ];
            }else{
                return round($overall / 5);
            }
        }else{
            if($attribute){
                return [
                    'comprehension'          => 0,
                    'pronounciation'            => 0,
                    'fluency'                => 0,
                    'vocabulary'             => 0,
                    'grammar'                 => 0,
                    'comprehension_total'     => 0,
                    'pronounciation_total'    => 0,
                    'fluency_total'           => 0,
                    'vocabulary_total'        => 0,
                    'grammar_total'           => 0,
                    'overall'                 => 0,
                ];
            }else{
                return 0;
            }
        }
    }
}
