<template>
	<div>
     	<div class="row">
			<div class="col-sm-10">
				<form v-bind:action="url" method="post" data-parsley-validate class="form-horizontal">
					<input type="hidden" name="_token" v-bind:value="token">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ trans('label.type') }}<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="type" v-model="type" required>
								<option value="discount" >{{ trans('label.discount') }}</option>
								<option value="free_class" >{{ trans('label.free_coupon_class') }}</option>
							</select>
						</div>
					</div>
					<div class="form-group" v-if="type == 'free_class'">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelCourse }}<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="coursetype" id="username" v-model="coursetype" required>
								<option v-for="coursetype in coursetypes"  :key="coursetype.id" :value="coursetype.id" >{{coursetype.name}}</option>
							</select>
						</div>
					</div>
					<div class="form-group" v-if="type == 'free_class'">
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
					<div class="form-group" v-if="type == 'free_class'">
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
					<div class="form-group" v-if="type == 'free_class'">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ trans('label.number_of_sessions') }} <small class="required text-muted">({{ trans('label.optional') }})</small>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" name="number_of_session"  class="form-control">
						</div>
					</div>
					<div class="form-group" v-if="type == 'free_class'">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ labelMonths }}<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<br>
								<label v-if="first_price">
								<input type="radio" name="month"  value="1"> &nbsp;1mos 
								</label>
								<br>
								
								<label v-if="third_price">
								<input type="radio" name="month" value="3"> &nbsp;3mos 
								</label> 
								<br>

								<label v-if="six_price">
								<input type="radio" name="month" value="6"> &nbsp;6mos
								</label> 
								<br>

								<label v-if="twelve_price">
								<input type="radio" name="month" value="12"> 12mos
								</label>
								<br>
						</div>
					</div>

					
					<div class="form-group"  v-if="type == 'discount'">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ trans('label.fixed_amount') }}<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="amount" required v-model="amount" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{{ trans('label.expiry') }}<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class='input-group date' id='datepicker'>
								<input type='text' name="expiry" class="form-control"  required />
								<span class="input-group-addon">
									<span class="fa fa-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >{{ trans('label.coupon_code') }}
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" min="1" v-model="num_of_codes" class="form-control">
							<input type="text" style="border:none;shadow:none" readonly class="form-control" name="codes[]" v-for="code in codes" :value="code" :key="code">
						</div>
					</div>
					<hr>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >

						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<button class="btn btn-primary bnt-lg"  type="submit"><i class="fa fa-save"></i> 제출</button>
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
				
				courseName: '',
                
            //type 
                amount: "",
                type: "discount",
                num_of_codes: 1,
                codes: [],
				
			//days 
				day1: false,
				day2: false,
				day3: false,
				day4: false,
				day5: false,
				day6: false,
				day7: false,

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
            num_of_codes: _.debounce(function(){
                this.getCodes();
            }, 250),
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
					this.day4 = true
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
            },
            minute: function(){
                this.setPrices()
            },
        
        },
        created(){
        	this.getCodes();
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
               getCodes()
               {
                   axios.post(baseUrl + '/admin/api/getcodes/' + this.num_of_codes)
                    .then( response =>{
                        this.codes = response.data
                    })
                    .catch( error => {
                        console.log( error )
                 })
               },

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
              	  this.uncheck();
                  if(this.coursetype && this.daysweek && this.minute){
                     	
			            console.log(this.daysweek)
                       
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
