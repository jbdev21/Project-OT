<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted' => ':attribute을(를) 동의해야 합니다.',
    'active_url' => ':attribute은(는) 유효한 URL이 아닙니다.',
    'after' => ':attribute은(는) :date 이후 날짜여야 합니다.',
    'after_or_equal' => ':attribute은(는) :date 이후 날짜이거나 같은 날짜여야 합니다.',
    'alpha' => ':attribute은(는) 문자만 포함할 수 있습니다.',
    'alpha_dash' => ':attribute은(는) 문자, 숫자, 대쉬(-)만 포함할 수 있습니다.',
    'alpha_num' => ':attribute은(는) 문자와 숫자만 포함할 수 있습니다.',
    'array' => ':attribute은(는) 배열이어야 합니다.',
    'before' => ':attribute은(는) :date 이전 날짜여야 합니다.',
    'before_or_equal' => ':attribute은(는) :date 이전 날짜이거나 같은 날짜여야 합니다.',
    'between' => [
        'numeric' => ':attribute은(는) :min에서 :max 사이여야 합니다.',
        'file' => ':attribute은(는) :min에서 :max 킬로바이트 사이여야 합니다.',
        'string' => ':attribute은(는) :min에서 :max 문자 사이여야 합니다.',
        'array' => ':attribute은(는) :min에서 :max 개의 항목이 있어야 합니다.',
    ],
    'boolean' => ':attribute은(는) true 또는 false 이어야 합니다.',
    'confirmed' => ':attribute 확인 항목이 일치하지 않습니다.',
    'date' => ':attribute은(는) 유효한 날짜가 아닙니다.',
    'date_format' => ':attribute이(가) :format 형식과 일치하지 않습니다.',
    'different' => ':attribute와(과) :other은(는) 서로 달라야 합니다.',
    'digits' => ':attribute은(는) :digits 자리 숫자여야 합니다.',
    'digits_between' => ':attribute)은(는) :min에서 :max 자리 사이여야 합니다.',
    'dimensions' => ':attribute은(는) 유효하지 않는 이미지 크기입니다.',
    'distinct' => ':attribute 필드에 중복된 값이 있습니다.',
    'email' => ':attribute은(는) 유효한 이메일 주소여야 합니다.',
    'exists' => '선택된 :attribute은(는) 유효하지 않습니다.',
    'file' => ':attribute은(는) 파일이어야 합니다.',
    'filled' => ':attribute 필드는 값이 있어야 합니다.',
    'image' => ':attribute은(는) 이미지여야 합니다.',
    'in' => '선택된 :attribute은(는) 유효하지 않습니다.',
    'in_array' => ':attribute 필드는 :other에 존재하지 않습니다.',
    'integer' => ':attribute은(는) 정수여야 합니다.',
    'ip' => ':attribute은(는) 유효한 IP 주소여야 합니다.',
    'ipv4' => ':attribute은(는) 유효한 IPv4 주소여야 합니다.',
    'ipv6' => ':attribute은(는) 유효한 IPv6 주소여야 합니다.',
    'json' => ':attribute은(는) JSON 문자열이어야 합니다.',
    'max' => [
        'numeric' => ':attribute은(는) :max보다 클 수 없습니다.',
        'file' => ':attribute은(는) :max킬로바이트보다 클 수 없습니다.',
        'string' => ':attribute은(는) :max자보다 클 수 없습니다.',
        'array' => ':attribute은(는) :max개보다 많을 수 없습니다.',
    ],
    'mimes' => ':attribute은(는) 다음의 파일 형식이어야 합니다: :values.',
    'mimetypes' => ':attribute은(는) 다음의 파일 형식이어야 합니다: :values.',
    'min' => [
        'numeric' => ':attribute은(는) 최소한 :min이어야 합니다.',
        'file' => ':attribute은(는) 최소한 :min킬로바이트이어야 합니다.',
        'string' => ':attribute은(는) 최소한 :min자이어야 합니다.',
        'array' => ':attribute은(는) 최소한 :min개의 항목이 있어야 합니다.',
    ],
    'not_in' => '선택된 :attribute이(가) 유효하지 않습니다.',
    'not_regex' => ':attribute의 형식이 올바르지 않습니다.',
    'numeric' => ':attribute은(는) 숫자여야 합니다.',
    'present' => ':attribute 필드가 있어야 합니다.',
    'regex' => ':attribute 형식이 유효하지 않습니다.',
    'required' => ':attribute 필드는 필수입니다.',
    'required_if' => ':other이(가) :value 일 때 :attribute 필드는 필수입니다.',
    'required_unless' => ':other이(가) :value에 없다면 :attribute 필드는 필수입니다.',
    'required_with' => ':values이(가) 있는 경우 :attribute 필드는 필수입니다.',
    'required_with_all' => ':values이(가) 모두 있는 경우 :attribute 필드는 필수입니다.',
    'required_without' => ':values이(가) 없는 경우 :attribute 필드는 필수입니다.',
    'required_without_all' => ':values이(가) 모두 없는 경우 :attribute 필드는 필수입니다.',
    'same' => ':attribute와(과) :other은(는) 일치해야 합니다.',
    'size' => [
        'numeric' => ':attribute은(는) :size (이)여야 합니다.',
        'file' => ':attribute은(는) :size킬로바이트여야 합니다.',
        'string' => ':attribute은(는) :size자여야 합니다.',
        'array' => ':attribute은(는) :size개의 항목을 포함해야 합니다.',
    ],
    'string' => ':attribute은(는) 문자열이어야 합니다.',
    'timezone' => ':attribute은(는) 올바른 시간대 이어야 합니다.',
    'unique' => ':attribute은(는) 이미 사용 중입니다.',
    'uploaded' => ':attribute을(를) 업로드하지 못했습니다.',
    'url' => ':attribute 형식은 유효하지 않습니다.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'admin_id'                  => '아이디',

            /*
        Manager
        */
        'manager'   => '매니저',
        'welcome'   => '환영',
        'general'   => '일반',
        'profile'   => '프로필',



        /*
        Log in
        */

        'log_in_form'                           => '로그인폼',
        'register'                              => '등록', 
        'confirm_password'                      => '비밀번호 확인', 
        'recovery_email'                        => '복구메일',
        'remember_me'                           => '기억하기',

        /*
        DashBoard
        */
        
        'on_going_class'                                => '진행중인 수업', 
        'today_ongoing_class_session'                   => '오늘 수업', 
        'level_tests'                                   => '레벨테스트', 
        'newly_created_level_tests'                     => '신규 레벨테스트', 
        'postponed_class'                               => '연기된 수업', 
        'postponed_class_session_starting_today'        => '오늘부 연기수업', 
        'new_enrolled'                                  => '신규등록', 
        'todays_newly_created_enrollments'              => '오늘부 신규', 
        'scheduled_classes'                             => '배정된 수업', 
        'lists_of_sessions'                             => '수업리스트', 
        'dashboard'                                     => 'Dashboard',
        'video_class'                                   => '화상영어',
        'phone_class'                                   => '전화영어',
        


        /*
        PERSONAL RELATED
        */  

        'name'                      => '이름', 
        'username'                  => '아이디', 
        'korean_name'               => '한글이름', 
        'english_name'              => '영문이름', 
        'gender'                    => '성별', 
        'mobile'                    => '휴대폰번호', 
        'contact_number'            => '전화번호', 
        'contact_number1'           => '전화번호1', 
        'contact_number2'           => '전화번호2', 
        'date_of_birth'             => '생년월일', 
        'birth_date'                => '생년월일', 
        'email'                     => '이메일', 
        'password'                  => '비밀번호', 
        'repeat_password'           => '비밀번호 확인', 
        'description'               => '설명', 
        'male'                      => '남성', 
        'female'                    => '여성', 

        'new_student'               => '신규수강생', 
        'all_student'               => '전체수강생', 
        'edit_student'              => '정보변경', 

        'account_setting'           => '계정설정',
        
        'setting'                   => '환경',

        'for_password_reset_only'   => '비밀번호 재설정용', 


        'forget_password'           => '비밀번호를 잊었나요?',
        'no_mobile_found'           => '전화번호 확인요망',
        'registration_saved'        => '등록완료',

        /*
        CLASS RELATED LABELS
        */

        'student'                   => '학생',  
        'remarks'                   => '특이사항',  
        'day'                       => '요일',  
        'date'                      => '날짜',  
        'affected_date'             => '적용날짜',  
        'type'                      => '타입',  
        'time'                      => '시간', 
        'minute'                    => '분',  
        'minutes'                   => '분',  
        'session'                   => '수업',  
        'teacher'                   => '강사', 
        'all_teacher'               => '모든강사',  
        'date_time'                 => '날짜 시간',  
        'datetime_failed'           => '날짜시간 확인요망 ', 
        'status'                    => '학생',  
        'attendance'                => '출석 ', 
        'title'                     => '타이틀',  
        'book'                      => '교재',  
        'date'                      => '날짜',  
        'dates'                     => '날짜',  
        'date_range'                => '날짜지정',  
        'page'                      => '페이지',  
        'pages'                     => '페이지',  
        'memo'                      => '메모', 
        'class_type'                => '수업타입',  
        'duration'                  => '분수',  
        'class_days'                => '수업요일',  
        'class_duaration'           => '수업기간',  
        'class_informations'        => '수업정보 ', 
        'days'                      => '요일', 
        'code'                      => '코드', 
        'minute_per_class'          => '분수별', 
        'number_of_months'          => '월별',  
        'number_of_sessions'        => '횟수별',  
        'price'                     => '수강료', 
        'payment_method'            => '결제방법',  
        'postponed_credits'         => '수강연기 크레딧 ', 
        'total_session'             => '총횟수',  
        'comment'                   => '코멘트',  
        'postponed_class'           => '수강연기',  
        'credit_deduction'          => '크레딧 차감', 
        'postponed'                 => '연기', 
        'postponed_sessions'        => '수강연기 ', 
        'enter_number_add'          => '추가하기',  
        'deducting_session'         => '줄이기',  
        'enter_number_deduct'       => '줄이기 ', 
        'today_class_session'       => '오늘수업',  

        'comprehension'             => '이해', 
        'pronounciation'            => '발음',  
        'fluency'                   => '유창성', 
        'vocabulary'                => '단어',  
        'grammar'                   => '문법',  
        'no_book_been_set'          => '교재 미설정', 
        'applied'                   => '적용',  
        'adding_session'            => '횟수추가',  
        'overall'                   => '사무용 겉옷',  

        'no_teacher_assigned'       => '강사 미지정',  

        'lifetime_holiday'          => '정규 휴일',  
        'apply_to_active_classes'   => '적용하기',  
        'credit'                    => '크레딧 ', 
        'pending'                   => '대기 ', 
        'paid'                      => '결제완료',  
        'class_code'                => '수업코드',  
        'student_name'              => '학생이름',  
        'student_korean_name'       => '한글이름',  
        'class'                     => '수업',  
        'class_type'                => '수업타입',  
        'select_days'               => '요일지정',  
        'submissions'               => '제출',  
        'sub_class'                 => '대체수업',  
        'select_dates_range'        => '날짜지정',  
        'submission_manger'         => '제출',
        'certificate'               => '확인서',

        'canceled_postponed'        => '연기취소', 

        'reason'                    => '사유', 
        'optional'                  => '선택사항', 

        'note'                      => '노트', 
        'credits'                   => '연기크레딧', // shortcut of postponed credits 

        'no_teacher'                => '강사없음', 
        'new_class'                 => '신규수업', 

        //manager
        'postponed_manager'         => '수업연기 관리', 
        'sub_teacher_manager'       => '대체강사 관리', 

        //leveltest
        'level_test'                => '레벨테스트',
        'level_test_result'         => 'Level Test Result', 


        //proofreading
        'new_proofreading'          => '신규첨삭', 
        'proofreading'              => '영문첨삭', 


    /*
    Comments
    */
        'new_comment'               => '신규코멘트', 
        'all_comment'               => '모든코멘트',
        'filter'                    => 'Filter', 
        

    /*
    faq
    */
        'adding_new_blog'           => '새글',
        'blog'                      => '블로그',
        'all_faq'                   => '모든글', 
        'faq'                       => '자주 묻는 질문', 


    /*
    BOOK RELATED LABELS
    */
        'books'                     => '교재', // url 
        'book'                      => '교재', // url 
        'location'                  => '위치', // url 
        'page_code'                 => '페이지 코드', 
        'starting_page_number'      => '시작페이지', 
        'total_number_of_page'      => '전체페이지', 
        'file_type'                 => '파일타입', 
        'adding_new_books'          => '교재추가', 
        'curriculum'                => '커리큘럼', 
        'curriculums'               => '커리큘럼',

    /*
    COURSE RELATED
    */
        'session_per_week'          => '주간수업', 
        'allowed_class_days'        => '승인', 
        'month'                     => '월별', 
        'months'                    => '월별', 
        'available'                 => '가능', 
        'adding_new_course'         => '코스추가', 
        'session_week'              => '주간세션', 
        'allowed_class_days'        => '승인', 
        'edit_course'               => '코스수정', 
        'no_course_type'            => '코스타입', 
        'all_course_type'           => '모든코스타입', 
        'courses'                   => '코스',
        'new'                       => '신규', 
        'number_of_days'            => '횟수', // for adding and deduction of session 
    /*
    BLOG RELATED 
    */
        'content'                   => '컨텐츠', 
        'category'                  => '카테고리', 
        'author'                    => '작성자', 
        'adding_new_blog'           => '신규작성', 
        'all_blog'                  => '전체보기', 


    /*
    INQUIRY RELATED
    */
        'inquiry'                   => '문의', 
        'message'                   => '내용', 
        'publish'                   => '작성', 
        'no_reply_yet'              => '댓글없음', 
        

    /*
    Notice
    */
        'adding_new_notice'         => '새글', 
        'notice'                    => '공지사항', 
        'edit_notice'               => '수정', 



        /*
        DATES
        */

        'mon'                       => '월', 
        'tues'                      => '화', 
        'wed'                       => '수', 
        'thurs'                     => '목', 
        'fri'                       => '금', 
        'start_date'                => '시작일', 
        'year'                      => '년도', 
        'new_holiday'               => '공휴일작성', 

        /*
        Teacher
        */

        'new_teacher'               => '강사추가', 
        'teacher'                   => '강사', 
        'teachers'                  => '강사', 
        'select_teacher'            => '강사선택', //lowercase  


        /*
        Others
        */

        'yes'                       => '예', 
        'no'                        => '아니오',  
        'no_postponed_session'      => '내용없음', 
        'no_student_found'          => '내용없음', 
        'no_comment_yet'            => '내용없음', 

        /*
        Books
        */

        'adding_new_book'           => '교재추가', 
        'start_page_number'         => '시작페이지', 

        /*
        Contents Related Labels
        */
        'inquiries'                 => '문의', 



        /*
        Holiday Related Labels
        */
        'life_time_holiday'         => '정규공휴일', 
        'apply_to_all_active_class' => '모두적용', 
        'holiday_name'              => '공휴일명', 
        'life_time'                 => '정규여부',
        'holiday'                   => '휴일',


        /*
        Testimonial Related Labels
        */
        'all_testimonial'           =>  '전체후기', 
        'testimonial'               => '후기', 

        /*
        Testimonial Related Labels
        */

        'book_name'                 => '교재명', 
        'page_number'               => '페이지수', 
        'no_class'                  => '수업없음', 
        'no_postponed_session'      => '해당없음', 
        'replies'                   => '댓글', 
        'new_password'              => '신규 비밀번호', 
        'old_password'              => '예전 비밀번호', 
        'change_password'           => '비밀번호 변경', 
        'delete_account'            => '계정삭제', 
        'email_address'             => '이메일', 
        'my_class'                  => '내 강의실', 
        'calendar_of_class'         => '수업캘린더', 
        'showing'                   => '홈페이지반영여부', // use for testimonial if in showing mode of or not 

        /*
        Alerts
        */

        'are_you_sure_to_delete'    => "삭제하시겠습니까?",

        /*
        Messages
        */

        'update_success'            => '수정되었습니다.', 
        'editing_new_curriculum'    => '수정하기',
        'general_information'       => '일반 정보',

        /*
        Settings Label
        */
        'website_application_name'                   => '사이트명',
        'site_title'                                 => '사이트명',   // Title of website or company
        'site_email'                                 => '이메일',   // Site email address - will show on website
        'website_email'                              => '이메일',   // Explanation: Email use by the admin
        'email_support'                              => '이메일',   
        'website_email_support'                      => '이메일',   // Explanation: Email address use for customer suppport
        'contact_information'                        => '연락처', 
        'phone_number'                               => '전화번호',  
        'companyphonenumber'                         => '전화번호', 
        'phone_number2'                              => '전화번호 2', 
        'companyphonenumber2'                        => '전화번호 2', 
        'company_address'                            => '주소', 
        'notification'                               => '알림', 
        'adminto_notify'                             => '알림', // Adminstrator to notify
        'adminwhorecievesnotification'               => '알림',  // Admin who recieves notification
        'default_gateway'                            => '디폴트 게이트웨이', 
        'nice_pay'                                   => '나이스페이',
        'pay_pal'                                    => '페이팔',
        'application_default_payment_gateway'        => '기본결제시스템 ', 
        'my_bank_information'                        => '계좌', 
        'bank_name'                                  => '은행명', 
        'thiswillshowfor_bankmethod'                 => '계좌이체란에 표기됩니다', //This will show for Bank method 
        'bank_account_number'                        => '계좌번호', 
        'account_numberwheretheenrolleepay'          => '계좌번호', //Account Number where the enrollee pay
        'bank_account_holder_name'                   => '예금주', 
        'bank_account_owner_name'                    => '예금주', 
        'merchant_k_e_y'                             => 'Merchant Key',  // Merchant Key
        'nice_pay_merchantkeyforvalidation'          => '나이스페이 확인', //NicePay Merchant key for validation
        'merchant_i_d'                               => '상점 아이디', //  Merchant ID
        'nice_pay_merchantkeyfor'                    => 'NicePay Merchant key', //NicePay Merchant key
        'all_the_gate'                               => '올더게이트', // All the Gate
        'store_i_d'                                  => '상점아이디', 
        'paypal'                                     => '페이팔', 
        'a_p_iurl'                                   => 'Api URL', // Api URL
        'a_p_i_key'                                  => 'Api Key',  // Api Key
        'a_p_i_password'                             => 'API Password', // API Password
        'defaults'                                   => '기본설정',
        'default_video_virtual_room'                 => '기본설정',
        'application_default_video_virtual_room'     => '기본설정',
        'videoware'                                  => '비디오웨어',
        'videoware_url'                              => '비디오웨어 URL',
        'theurlorservertoconnect'                    => '서버주소', //The url or server to connect
        'braincert'                                  => '브레인서트', 
        'a_p_i_endpoint'                             => 'API End point',
        'braincert_a_p_i_endpoint'                   => 'Brancert API End point', // Brancert API End point
        'application_programming_interface_key'      => 'Application Programming Interface Key', //Application Programming Interface Key
        'level_test_duration'                        => '레벨테스트 시간',
        'minutesof_level_test_class'                 => '분수', //Minutes of level Test
        'minutes_before_class'                       => '강의시간 이전 강의실 오픈시간', //Minutes Before Class
        'minutesallowedtoopenclassroom'              => '강의실 접속제한시간', // Minutes allowed to open class room
        'minutes_after_class'                        => '강의시간 이후 강의실 오픈시간', //Minutes After Class
        'minutesallowedevenclasshourshasbeenended'   => '수업종료 후 강의실 오픈시간', //Minutes allowed even class hours has been ended
        'classroom_time_zone'                        => '타임존',
        'application_default_classroom_time_zone'    => '타임존 설정',
        'datacenter_region'                          => '데이터센터',
        'application_default_datacenter_region'      => '테이터센터 설정',
        'timeand_date_formats'                       => '날짜형식', // Date and Time format
        'date_time_format'                           => '날짜형식',
        'overall_datetime_format'                    => '날짜형식',
        'date_format'                                => '날짜형식',
        'overall_date_format'                        => '날짜형식',
        'time_format'                                => '날짜형식',
        'overall_date_format'                        => '날짜형식',
        'timezones'                                  => '타임존',
        'admin_timezone'                             => '관리자 타임존',
        'administrator_timezone'                     => '관리자 타임존',
        'teacher_timezone'                           => '강사 타임존',
        'teacher_timezone'                           => '강사 타임존',
        'student_timezone'                           => '학생 타임존',
        'student_timezone'                           => '학생 타임존',




        /*
        Enrollment Label
        */
        'weekly_agenda'                             => '주별',
        'days_agenda'                               => '월별',
        'renew_every_month'                        => '1개월',
        'renew_every_3_months'                      => '3개월', 
        'renew_every_6_months'                      => '6개월',
        'renew_every_1_year'                        => '1년',
        'date_&_time'                               => '날짜 및 시간',
        'course'                                    => '코스',
        'payment'                                   => '수강료',
        'finish'                                    => '완료',
        'what_day_you_want'                         => '수업요일', // with question mark
        'when_do_you_want_to_start'                 => '시작일', // with question mark
        'what_time_do_you_want'                     => '수업시간', // with question mark
        'product'                                   =>'제품',
        'min.'                                      =>'분',
        'sessions'                                  =>'세션',
        'credi_card'                                =>'신용카드',
        'bank'                                      =>'은행계좌',
        'date_of_payment'                           =>'입금날짜',
        'payor_name'                                =>'입금자명',
        'bank_information'                          =>'은행정보',
        'submission_manager'                        =>'제출',
        'user_id'                                   =>'아이디',
        'personal_information'                      =>'개인정보',
        'class_information'                         =>'수강정보',
        'total_sessions'                            =>'전체수업',
        'enrolled_date'                             =>'등록일자',
        'won'                                       =>'원',
        'min'                                       =>'분',
        'mos'                                       =>'개월',
        '1_month'                                   =>'1개월',
        '3_months'                                  =>'3개월',
        '6_months'                                  =>'6개월',
        '12_months'                                 =>'12개월',
        'discount'                                  =>'할인',


    /*
    Graph Label
    */
        'my_progress'                           => 'My Progress',
        'all_students'                           => 'All Students',
        'reply'                                  => 'Reply',

        'apperance'                             => '보기',
        'content'                               => '컨텐츠',
        'behavior'                              => '규칙',
        'publish'                               => '게시',
        'popup'                                 => '팝업',
        'position'                              => '위치',
        'top'                                   => '상단',
        'center'                                => '중앙',
        'colors'                                => '색상',
        'title_color'                           => '제목색',
        'text_color'                            => '글자색',
        'button_text_color'                     => '버튼글자색',
        'button_color'                          => '버튼색',
        'background_color'                      => '배경색',
        'button_text'                           => '버튼색',
        'button_link'                           => '링크',
        'start_to_display'                      => '게시시작',// this selection is date
        'end_of_display'                        => '게시종료', //this selection is date
        'load_to_display'                        => '게시옵션',
        'every_homepage_load'                   => '매번',
        'just_on_first_load'                    => '한번만',
        'show'                                  => '보기',
        'active'                                => 'Active',
        'banner'                                 => '배너',
    ],
];