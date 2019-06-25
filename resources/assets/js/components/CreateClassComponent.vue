<template>
	<div>
     	<div class="row">
               		<div class="col-sm-10">
               			<form v-bind:action="url" method="post" data-parsley-validate class="form-horizontal">
               				<input type="hidden" name="_token" v-bind:value="token">
	               			<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelUsername }} <span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control select" name="student_id" required id="selectstudent">
		                            	<!-- <option v-for="student in students" :key="student.id" v-bind:value="student.id">{{student.username}}: {{ student.korean_name }}</option> -->
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelTeacher }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control select" name="teacher_id" required>
		                            	<option v-for="teacher in teachers" :key="teacher.id"  v-bind:value="teacher.id" >{{teacher.name}}</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelCourse }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control" name="coursetype" id="username" v-model="coursetype" required>
		                            	<option v-for="coursetype in coursetypes" :key="coursetype.id"  v-bind:value="coursetype.id" >{{coursetype.name}}</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelMinutes }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control" name="minutes" v-model="minute"  required>
		                            	<option v-for="minute in minutes" :key="minute.id"  v-bind:value="minute.minutes" >
		                            	   {{ minute.minutes}} minutes per day
		                            	</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelDaysperweek }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control" name="daysweeks" v-model="daysweek">
		                            	<option v-for="daysweek in daysweeks" :key="daysweek.id" v-bind:value="daysweek.days_in_week" >
		                            	   {{ daysweek.days_in_week}} days per Week
		                            	</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelMonths }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                        	<br>
		                        	  <label v-show="first_price">
		                        	  	<input type="radio" name="month" checked  value="1"> &nbsp;1mos : {{first_price}} 
		                        	  </label>
		                        	  <br>
			                          
			                          <label v-show="third_price">
			                          	<input type="radio" name="month" value="3"> &nbsp;3mos : {{third_price}} ({{third_percent}}%)
			                          </label> 
			                          <br>

			                          <label v-show="six_price">
			                          	<input type="radio" name="month" value="6"> &nbsp;6mos : {{six_price}} ({{six_percent}}%)
			                          </label> 
			                          <br>

			                          <label v-show="twelve_price">
			                          	<input type="radio" name="month" value="12"> 12mos : {{twelve_price}} ({{twelve_percent}}%)
			                          </label>
			                          <br>
		                        </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelSelectdays }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          	<br>
		                          	<label><input @click="dayClick" :checked="day1" type="checkbox" value="1" class="single-checkbox" name="days[]"> Mon </label>&nbsp;&nbsp;
		                          	<label><input @click="dayClick" :checked="day2" type="checkbox" value="2" class="single-checkbox" name="days[]"> Tue </label> &nbsp;&nbsp;
		                          	<label><input @click="dayClick" :checked="day3" type="checkbox" value="3" class="single-checkbox" name="days[]"> Wed </label> &nbsp;&nbsp;
		                          	<label><input @click="dayClick" :checked="day4" type="checkbox" value="4" class="single-checkbox" name="days[]"> Thu </label> &nbsp;&nbsp;
		                          	<label><input @click="dayClick" :checked="day5" type="checkbox" value="5" class="single-checkbox" name="days[]"> Fri </label> &nbsp;
	                          		<label><input @click="dayClick" :checked="day6" type="checkbox" value="6" class="single-checkbox" name="days[]"> Sat </label> &nbsp;
                          			<label><input @click="dayClick" :checked="day7" type="checkbox" value="7" class="single-checkbox" name="days[]"> Sun </label> &nbsp;
		                        </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelStartdate }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          <input type='text'  id="datepicker"  name="start_date" required  v-model="today" class="form-control"   />
			                    </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelStarttime }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         	<select type='text' name="time" class="form-control input-lg" id="select2" required>
				                          <optgroup label="Morning Class"></optgroup>
				                          <option value="6:00AM">6:00 AM</option>
				                          <option value="6:10AM">6:10 AM</option>
				                          <option value="6:20AM">6:20 AM</option>
				                          <option value="6:30AM">6:30 AM</option>
				                          <option value="6:40AM">6:40 AM</option>
				                          <option value="6:50AM">6:50 AM</option>
				                          <option value="7:00AM">7:00 AM</option>
				                          <option value="7:10AM">7:10 AM</option>
				                          <option value="7:20AM">7:20 AM</option>
				                          <option value="7:30AM">7:30 AM</option>
				                          <option value="7:40AM">7:40 AM</option>
				                          <option value="7:50AM">7:50 AM</option>
				                          <option value="8:00AM">8:00 AM</option>
				                          <option value="8:10AM">8:10 AM</option>
				                          <option value="8:20AM">8:20 AM</option>
				                          <option value="8:30AM">8:30 AM</option>
				                          <option value="8:40AM">8:40 AM</option>
				                          <option value="8:50AM">8:50 AM</option>
				                          <option value="9:00AM">9:00 AM</option>
				                          <option value="9:10AM">9:10 AM</option>
				                          <option value="9:20AM">9:20 AM</option>
				                          <option value="9:30AM">9:30 AM</option>
				                          <option value="9:40AM">9:40 AM</option>
				                          <option value="9:50AM">9:50 AM</option>
				                          <option value="10:00AM">10:00 AM</option>
				                          <option value="10:10AM">10:10 AM</option>
				                          <option value="10:20AM">10:20 AM</option>
				                          <option value="10:30AM">10:30 AM</option>
				                          <option value="10:40AM">10:40 AM</option>
				                          <option value="10:50AM">10:50 AM</option>
				                          <option value="11:00AM">11:00 AM</option>
				                          <option value="11:10AM">11:10 AM</option>
				                          <option value="11:20AM">11:20 AM</option>
				                          <option value="11:30AM">11:30 AM</option>
				                          <option value="11:40AM">11:40 AM</option>
				                          <option value="11:50AM">11:50 AM</option>
				                          <option value="12:00AM">12:00 AM</option>
				                          <optgroup label="Afternoon Class"></optgroup>
				                          <option value="12:10PM">12:10 PM</option>
				                          <option value="12:20PM">12:20 PM</option>
				                          <option value="12:30PM">12:30 PM</option>
				                          <option value="12:40PM">12:40 PM</option>
				                          <option value="12:50PM">12:50 PM</option>
				                          <option value="01:00PM">01:00 PM</option>
				                          <option value="01:10PM">01:10 PM</option>
				                          <option value="01:20PM">01:20 PM</option>
				                          <option value="01:30PM">01:30 PM</option>
				                          <option value="01:40PM">01:40 PM</option>
				                          <option value="01:50PM">01:50 PM</option>
				                          <option value="02:00PM">02:00 PM</option>
				                          <option value="02:10PM">02:10 PM</option>
				                          <option value="02:20PM">02:20 PM</option>
				                          <option value="02:30PM">02:30 PM</option>
				                          <option value="02:40PM">02:40 PM</option>
				                          <option value="02:50PM">02:50 PM</option>
				                          <option value="03:00PM">03:00 PM</option>
				                          <option value="03:10PM">03:10 PM</option>
				                          <option value="03:20PM">03:20 PM</option>
				                          <option value="03:30PM">03:30 PM</option>
				                          <option value="03:40PM">03:40 PM</option>
				                          <option value="03:50PM">03:50 PM</option>
				                          <option value="04:00PM">04:00 PM</option>
				                          <option value="04:10PM">04:10 PM</option>
				                          <option value="04:20PM">04:20 PM</option>
				                          <option value="04:30PM">04:30 PM</option>
				                          <option value="04:40PM">04:40 PM</option>
				                          <option value="04:50PM">04:50 PM</option>
				                          <option value="05:00PM">05:00 PM</option>
				                          <option value="05:10PM">05:10 PM</option>
				                          <option value="05:20PM">05:20 PM</option>
				                          <option value="05:30PM">05:30 PM</option>
				                          <option value="05:40PM">05:40 PM</option>
				                          <option value="05:40PM">05:50 PM</option>
				                          <optgroup label="Night Class"></optgroup>
				                          <option value="06:00PM">06:00 PM</option>
				                          <option value="06:10PM">06:10 PM</option>
				                          <option value="06:20PM">06:20 PM</option>
				                          <option value="06:30PM">06:30 PM</option>
				                          <option value="06:40PM">06:40 PM</option>
				                          <option value="06:50PM">06:50 PM</option>
				                          <option value="07:00PM">07:00 PM</option>
				                          <option value="07:10PM">07:10 PM</option>
				                          <option value="07:20PM">07:20 PM</option>
				                          <option value="07:30PM">07:30 PM</option>
				                          <option value="07:40PM">07:40 PM</option>
				                          <option value="07:50PM">07:50 PM</option>
				                          <option value="08:00PM">08:00 PM</option>
				                          <option value="08:10PM">08:10 PM</option>
				                          <option value="08:20PM">08:20 PM</option>
				                          <option value="08:30PM">08:30 PM</option>
				                          <option value="08:40PM">08:40 PM</option>
				                          <option value="08:50PM">08:50 PM</option>
				                          <option value="09:00PM">09:00 PM</option>
				                          <option value="09:10PM">09:10 PM</option>
				                          <option value="09:20PM">09:20 PM</option>
				                          <option value="09:30PM">09:30 PM</option>
				                          <option value="09:40PM">09:40 PM</option>
				                          <option value="09:50PM">09:50 PM</option>
				                          <option value="10:00PM">10:00 PM</option>
				                          <option value="10:10PM">10:10 PM</option>
				                          <option value="10:20PM">10:20 PM</option>
				                          <option value="10:30PM">10:30 PM</option>
				                          <option value="10:40PM">10:40 PM</option>
				                          <option value="10:50PM">10:50 PM</option>
				                          <option value="11:00PM">11:00 PM</option>
				                          <option value="11:10PM">11:10 PM</option>
				                          <option value="11:20PM">11:20 PM</option>
				                          <option value="11:30PM">11:30 PM</option>
				                          <option value="11:40PM">11:40 PM</option>
				                          <option value="11:50PM">11:50 PM</option>
				                      </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelStatus }}<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         		<br>
		                         			<input v-bind:value="course_id" name="course_id" type="hidden">
		                          	<label><input type="radio" value="pending" name="status"> {{ labelPending }} </label>&nbsp;
		                          	<label><input type="radio" value="paid" name="status"> {{ labelPaid }} </label> &nbsp;
		                        </div>
	                    	</div>
	                    	<hr>
	                    	
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >

		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         	<button class="btn btn-primary bnt-lg" :disabled="!course_id" type="submit"><i class="fa fa-save"></i> 제출</button>
		                        </div>
	                    	</div>
                    	</form>
               		</div>
               		<div class="col-sm-3"></div>
        </div>
    </div>
</template>

<script>
    export default {
    	props:[
    		'url',
			'token',
			'labelUsername',
			'labelTeacher',
			'labelCourse',
			'labelMinutes',
			'labelMonths',
			'labelDaysperweek',
			'labelSelectdays',
			'labelStartdate',
			'labelStarttime',
			'labelStatus',
			'labelPending',
			'labelPaid',
			'today'
			
    	],
        data: function(){
        	return {
    		//from database
        		students: {},
        		teachers: {},
        		coursetypes: {},
        		minutes: {},
        		months: {},
        		daysweeks:{},
				selectedMonth: 1,
				
			//days 
				day7: false,
				day1: false,
				day2: false,
				day3: false,
				day4: false,
				day5: false,
				day6: false,

    		//dynamic data
        		coursetype: '',
        		month:'',
        		minute:'',
        		daysweek: '',
        		course_id:'',

        	//for prices
        		first_price: '',
        		third_price: '',
        		six_price: '',
        		twelve_price: '',

        	//for percentages=
              	third_percent: '',
              	six_percent: '',
              	twelve_percent: ''
        	}
        },
        watch:{
        	coursetype: function(){

        		//get minutes
        		axios.get(baseUrl + '/course/getminutes/' + this.coursetype)
                .then( response => {
                  	this.minutes = response.data;
                }).catch((err) => {
                  console.log(err);
                });

                //get days on a week
                axios.get(baseUrl + '/course/daysweek/' + this.coursetype)
                .then((response) => {
                  	this.daysweeks = response.data;
                }).catch((err) => {
                  console.log(err);
                });

                this.setPrices()
        	},

        	daysweek: function(){
				if(this.daysweek == 1)
				{
					this.day1 = true
					this.day2 = false
					this.day3 = false
					this.day4 = false
					this.day5 = false
					this.day6 = false
					this.day7 = false
				}else if(this.daysweek == 2)
				{
					this.day1 = false
					this.day2 = true
					this.day3 = false
					this.day4 = true
					this.day5 = false
					this.day6 = false
					this.day7 = false
				}else if(this.daysweek == 3)
				{
					this.day1 = true
					this.day2 = false
					this.day3 = true
					this.day4 = false
					this.day5 = true
					this.day6 = false
					this.day7 = false
				
				}else if(this.daysweek == 4)
				{
					this.day1 = true
					this.day2 = true
					this.day3 = true
					this.day4 = true
					this.day5 = false
					this.day6 = false
					this.day7 = false
				
				}else if(this.daysweek == 5)
				{
					this.day1 = true
					this.day2 = true
					this.day3 = true
					this.day4 = true
					this.day5 = true
					this.day6 = false
					this.day7 = false
				
				}else if(this.daysweek == 6)
				{
					this.day1 = true
					this.day2 = true
					this.day3 = true
					this.day4 = true
					this.day5 = true
					this.day6 = true
					this.day7 = false
				}else if(this.daysweek == 7)
				{
					this.day1 = true
					this.day2 = true
					this.day3 = true
					this.day4 = true
					this.day5 = true
					this.day6 = true
					this.day7 = true
				}
				
                this.setPrices()
				
				//var bol = $(".single-checkbox:checked").length >= this.daysweek;
	            $(".single-checkbox").not(":checked").attr("disabled", false);

			},
			
            minute: function(){
                this.setPrices()
            },
        
        },
        created(){
        	//get students

        	// axios.post(baseUrl + '/api/getstudents')
        	// 	.then( response => {
        	// 		this.students = response.data
        	// 	})
        	// 	.catch( error => {
        	// 		console.log(error)
        	// 	})

        	//get teachers
        	axios.post(baseUrl + '/api/getteachers')
        		.then( response => {
        			this.teachers = response.data
        		})
        		.catch( error => {
        			console.log(error)
        		})

        	//getting course types
        	axios.post(baseUrl + '/api/getcoursetypes')
        		.then( response => {
        			this.coursetypes = response.data
        		})
        		.catch( error => {
        			console.log(error)
        		})

        },
         methods:{
         	  dayClick()
         	  {
 	  				var bol = $(".single-checkbox:checked").length >= this.daysweek;
	                $(".single-checkbox").not(":checked").attr("disabled",bol);
         	  },

         	  uncheck()
         	  {
         	  	 $(".single-checkbox").attr('checked', false); // Unchecks it
         	  },

              setPrices(){
              	  //this.uncheck();
                  if(this.coursetype && this.daysweek && this.minute){
                     	
			            //console.log(this.daysweek)
                       
                       axios.get(baseUrl + '/course/getcourse/' + this.coursetype + '/' + this.daysweek + "/" + this.minute)
                        .then( response => {

                        	  this.course_id = response.data.id
                              this.first_price = response.data.price

                              this.third_price = response.data.three_price
                              this.third_percent = response.data.three_percent

                              this.six_price = response.data.six_price
                              this.six_percent = response.data.six_percent

                              this.twelve_price = response.data.twelve_price
                              this.twelve_percent = response.data.twelve_percent

                        }).catch((err) => {
                          console.log(err);
                        });
                  }
              }

          },
    }
</script>
