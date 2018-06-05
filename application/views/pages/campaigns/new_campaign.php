
<?php $this->load->view('templates/header'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>

           Contact Details
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">School Details</li>
        </ol>
        <?php //$this->load->view('/templates/components/notification') ?>
    </section>

    <div class="container-fluid ">
        <div class=" ">
            <div id="exTab1" class="">


                <div class="tab-content clearfix">


                    <div class="tab-pane active" id="1a">


                        <section class="">

                            <!-- Main content School Details-->
                            <!--- Schools contacts -->

                            <div class="box">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Contact Details</h3>
                                </div>


                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form"  method="POST">
                                        

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">Campaign Name</label>
                                                    <input type="text" name="campaign_name" class="form-control" value="" placeholder="Campaign Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Students to Place</label>
                                                        <input type="number" name="students_to_place" class="form-control" value="" placeholder="999" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Self Placing Students </label>
                                                        <input type="number" name="self_placing_students" class="form-control" value="" placeholder="55" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end row-->


                                        <div class="row">
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <label class=" ">School</label>
                                                    <input id="school" type="text" name="select_school" class=" form-control" value="" placeholder="School Name" >

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="">
                                                        <label >Placement Start Date</label>
                                                        <input type="text" name="campaign_place_start_date" class="datepicker form-control" value="" placeholder="01/01/2018" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label >Placement End Date </label>
                                                        <input type="text" name="campaign_place_end_date" class="datepicker form-control" value="" placeholder="01/01/2018" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                        
                                        </div> <!--end row-->
                                        
                                        
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div style="padding-top:40px;" >
                                                        <button class="btn btn-mploy"> Calculate Dates </button>
                                                    </div  >
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-8"> 
                                                <h4>School Holidays</h4>
                                                <div id="holidaysContainer">
                                                
                                                <table  id="holidays" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>                                               
                                                        <th>Start</th>
                                                        <th>End</th>

                                                        <th>Holiday</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>                                               
                                                    <tr>
                                                        <td>
                                                        <input id="1start_date" name="start_date[]" type="text" class="datepicker form-control">
                                                        </td>
                                                        <td>
                                                        <input id="1end_date" name="end_date[]" type="text" class="datepicker form-control">
                                                        </td>
                                                        <td>
                                                        <input name="holiday[]" type="text" class="form-control">
                                                        </td>
                                                        <td> 
                                                        <button id="1" type="button" class="white-btn btn ">Edit</button>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color:#fff;border-color:#fff">
                                                        <td></td>
                                                        <td></td>
                                                        <td><button type="button" id="add-row" class="btn btn-mploy white-btn">Add Holiday </button> </td>
                                                    </tr>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div><!--end col-->
                                        <div class="row">
    .                                        <div class="col-md-4">
                                                <div class="form-group">
                                                <label >Campaign Start Date </label>
                                                <input type="text" class="datepicker form-control" name="campaign_start_date" >
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Mailshot 1 Date</label>
                                                    <input name="mailshot_1_date" type="text" class="datepicker form-control" >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">   
                                                    <div class="form-group">
                                                    <label >Mailshot 2 Date</label>
                                                    <input name="mailshot_2_date" type="text" class="datepicker form-control" >
                                                    </div>
                                            </div>
                                            
                                        </div> <!--end row -->

                                        <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Employer Engagement Start</label>
                                                <input name="employer_engagement_start" type="text" class="datepicker form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Employer Engagement End</label>
                                                <input name="employer_engagement_end" type="text" class="datepicker form-control pull-right" id="datepicker">
                                                </div>
                                        </div>
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Self Place Deadline</label>
                                                <input name="self_place_deadline" type="text" class="datepicker form-control" >
                                                </div>
                                        </div>
                                    </div> <!--end row -->

                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Matching Start</label>
                                                <input name="matching_start" type="text" class="datepicker form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">   
                                                <div class="form-group">
                                                <label >Matching End</label>
                                                <input name="matching_end" type="text" class="datepicker form-control" >
                                                </div>
                                        </div>
                                        
                                    </div> <!--end row -->
                                        
                                
                                    



                                <div class="row">
                                    <div class="col-md-4">
                                    <input type="submit" class="btn btn-mploy-submit" value="Save Changes">
                                    <input type="button" class="btn btn-mploy-cancel" value="Cancel" onclick="window.location.replace('/companies/campaigns ?>/contacts')">
                                    </div>
                                </div>
                                </form>
                            </div>


                        </section>



                    </div>

                </div> <!-- end tab content -->



            </div>
        </div>
    </div> <!-- end tab container -->

    <?php $this->load->view('templates/footer'); ?>
    
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<script>
   $('#add-row').click(function(){
        var rows = $('#holidays tbody tr').length;
        var table = $('#holidays');
        var start_date ='<td><input id ="'+rows+'start_date" type="text" name="start_date[]" value="" class="datepicker form-control"></td>';
        var end_date ='<td><input id ="'+rows+'end_date" type="text" name="end_date[]" value="" class="datepicker form-control"></td>';
        var holiday ='<td><input id ="'+rows+'holiday" type="text" name="holiday[]" value="" class="form-control"></td>';
        var button = '<td><button onclick="editRow('+rows+')" id ="'+rows+'" type="button" class="white-btn btn ">Edit</button><td>';    
            var row = $('<tr>').html(start_date + end_date + holiday + button);
            table.find('tr:last').prev().after(row);
           
            $(function() {$('.datepicker').daterangepicker({opens: 'left',singleDatePicker: true,});});
    });

    function editRow(id){        
        var date = $('#'+id+'date');
        var holiday = $('#'+id+'holiday');
        if (date.attr('disabled')) {
            date.removeAttr('disabled');
            holiday.removeAttr('disabled');
        } else {
            date.attr('disabled', 'disabled');
            holiday.attr('disabled', 'disabled');
        }
    }


//date range
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});

$(function() {$('.datepicker').daterangepicker({opens: 'left',singleDatePicker: true,});});





</script>

<

<script>
    $(function(){
        
        
        
        
        $( "#school" ).autocomplete({source: "http://mploy.local/schools/getSchools/?"});
    })
</script>