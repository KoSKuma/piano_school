$(document).ready(function(){
			var now = moment();
			var next_seven_day = moment().add(7, 'days');
			

			var current_days = moment(now).format('MM/DD/YYYY');
			var sevendays = moment(next_seven_day).format('MM/DD/YYYY');
			
		
			$('#reservationtime').daterangepicker({
				"ranges":{
					"Today":[],
					"7 Days":[
						current_days,
						sevendays
					]
				}
			});
			$('#reservationtime').on('apply.daterangepicker' , function(ev, picker) { 
				$("#dateform").submit();
			});

			$('#reservationtime-mobile').daterangepicker({
				"ranges":{
					"Today":[],
					"7 Days":[
						current_days,
						sevendays
					]
				}
			});
			$('#reservationtime-mobile').on('apply.daterangepicker' , function(ev, picker) { 
				$("#sliding").slideToggle();
			});
		

			$("#sliding").hide();
			$("#btn-show-hide").show();	
			$("#btn-show-hide").click(function(){
				$("#sliding").slideToggle();
			});	

			$("#prevday").click(function(){
				var date = $('#reservationtime-mobile').daterangepicker().val();
				var split = date.split(' - ');
				var start_date = split[0];
				var prevday = moment(start_date).subtract(1, 'days').format('MM/DD/YYYY');
				var concat_prevday = prevday.concat(' - ',prevday);
				var str_prevday = String(concat_prevday);
			$('#reservationtime-mobile').daterangepicker().val(str_prevday);
			$("#dateform-mobile").submit();
			});

			$("#nextday").click(function(){
				var date = $('#reservationtime-mobile').daterangepicker().val();
				var split = date.split(' - ');
				var start_date = split[0];
				var prevday = moment(start_date).add(1, 'days').format('MM/DD/YYYY');
				var concat_prevday = prevday.concat(' - ',prevday);
				var str_prevday = String(concat_prevday);
			$('#reservationtime-mobile').daterangepicker().val(str_prevday);
			$("#dateform-mobile").submit();
			});

		})