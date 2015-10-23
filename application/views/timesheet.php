<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to timesheets 1.0</title>

        <script src="<?php  echo base_url().'assets/dist/handsontable.full.js' ?>"></script>
<!--        <script src="<?php //echo base_url().'assets/js/jquery.min.js' ?>"></script>
-->        <link rel="stylesheet" media="screen"  href="<?php echo base_url().'assets/dist/handsontable.full.css' ?>">
<!--        <link rel="stylesheet" media="screen" href="http://handsontable.com/dist/handsontable.full.css">-->
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/jquery/jquery-1.10.2.js"></script>
<!--<script src="http://handsontable.github.io/handsontable-ruleJS/lib/handsontable/handsontable.full.js"></script>-->
<!--<link rel="stylesheet" media="screen" href="http://handsontable.github.io/handsontable-ruleJS/lib/handsontable/handsontable.full.css">-->
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/lodash/lodash.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/underscore.string/underscore.string.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/moment/moment.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/numeral/numeral.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/numericjs/numeric.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/js-md5/md5.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/jstat/jstat.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/lib/formulajs/formula.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/js/parser.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/RuleJS/js/ruleJS.js"></script>
<script src="http://handsontable.github.io/handsontable-ruleJS/lib/handsontable/handsontable.formula.js"></script>
<!--<link rel="stylesheet" media="screen" href="http://handsontable.github.io/handsontable-ruleJS/css/samples.css">-->

</head>
<body>
<?php $this->load->view('admin_nav') ?>
<?php 
$formarray = array();
                            $counter = 0;
                                  foreach ($week_ends as $innerArray) {

                                      $counter++;
                        if (is_array($innerArray)){

                            foreach ($innerArray as $value) 
                                {
                                            $formarray[$value] = $value ;
                                        }

                                    }

                                }     
                       
$attributes = array( 'id' => 'searchForm','name' => 'searchForm' );

$js = 'id="we" onChange="this.form.submit()"';
echo form_open('Admin_controller/timesheets_reload');

echo form_dropdown('we', $formarray,'',$js);
echo form_close();
echo form_open('Admin_controller/process_timesheet',$attributes); 
                                                                           ?>
     <div id="example"></div>
     
     <input type="hidden" name="total" value="">
     
   <?php   echo form_submit('mysubmit', 'Submit Post!') ?>
    <p class="submit"><input type="submit" name="commit" value="submit"></p>
     
     
      <script type ="text/javascript" >
            
function getprojectData() {
    
  /*      return [
  
  ["TC","2015-10-24","PHIL_180","Programming","Programming", '0', '1', '2', '3', '3', '5','0' , '= SUM(F1:L1)'],
  ["TC","2015-10-24","PHIL_180","Programming","Programming", 0, 1, 1, 1,1, '2',0 , '= SUM(F2:L2)'],
  ["TC","2015-10-24","PHIL_180","Programming","Programming", 0, 5, 1, 1, 2,'1',0 , '= SUM(F3:L3)'],
  ["TC","2015-10-24","PHIL_186","Programming","Programming", 0, 5, 1, 1, 2,'1',0 , '= SUM(F4:L4)']
]*/
        
       /* return [['TC','2015-01-10','LOTV','fake','<p>fake</p>','LOTV','0','8','4','3','0','5','0'],
            ['TC','2015-10-17','LOTV','weak','','LOTV','0','9','2','0','4','0','0'],
            ['TC','2015-10-24','LOTV','fake','<p>weak</p>','LOTV','0','8','10','0','3','0','0']]*/
    
        <?php 
        
        $return = 'return [';
        $counter = 0;
              foreach ($timesheet as $innerArray) {
    //  Check type
                  $counter++;
    if (is_array($innerArray)){
        //  Scan through inner loop
        $return .= '[';
        foreach ($innerArray as $value) {
            $return .= "'".$value."',";
        }
        $return .= "'= SUM(F$counter:L$counter)'";
       // $return=rtrim($return, ",");
        $return .= ',"false"],';
    }
    
}     
      //$return=rtrim($return, ",");
       $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
      $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
      $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
      $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
      $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
      $counter +=1;
      $return .= "['','','','','','' , '', '', '', '', '', '', '= SUM(F$counter:L$counter)','false'],";
     
      //$counter +=1;
      $return .= "['Total','','','','', '= SUM(F1:F$counter)', '= SUM(G1:G$counter)', '= SUM(H1:H$counter)', '= SUM(I1:I$counter)', '= SUM(J1:J$counter)', '= SUM(K1:K$counter)', '= SUM(L1:L$counter)','= SUM(M1:M$counter)','false']";
      $return .= "]";
      echo $return;
              
        ?>

    
};

function getprojectTasks() {
    //console.log(projectids);
  /* var arr =  [
       ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total'],
            ['save data', 'data erase', 'data dump', 'create links', 'project management', 'data cross', 'call', 'Meetings']];
        return  arr[projectids];*/
  
            
  <?php 
        
        $return = 'return [';
        $counter = 0;
              foreach ($task as $innerArray) {
    //  Check type
                  $counter++;
    if (is_array($innerArray)){
        //  Scan through inner loop
       // $return .= '[';
        foreach ($innerArray as $value) {
            $return .= "'".$value."',";
        }
        //$return .= "'= SUM(F$counter:L$counter)'";
      //  $return=rtrim($return, ",");
       // $return .= '],';
    }
    
}     
      $return=rtrim($return, ",");
      $return .= "]";
      echo $return;
              
        ?>
  
               };
               
              function getprojectlist() {
    //console.log(projectids);
  /* var arr =  [
       ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total'],
            ['save data', 'data erase', 'data dump', 'create links', 'project management', 'data cross', 'call', 'Meetings']];
        return  arr[projectids];*/
  
            
  <?php 
        
        $return = 'return [';
        $counter = 0;
              foreach ($project_keys as $innerArray) {

                  $counter++;
    if (is_array($innerArray)){
       
        foreach ($innerArray as $value) {
            $return .= "'".$value."',";
        }
     
    }
    
}     
      $return=rtrim($return, ",");
      $return .= "]";
      echo $return;
              
        ?>
                
}             
  
  
   function getweekend() {
    //console.log(projectids);
  /* var arr =  [
       ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total'],
            ['save data', 'data erase', 'data dump', 'create links', 'project management', 'data cross', 'call', 'Meetings']];
        return  arr[projectids];*/
  
            
  <?php 
        
                            $return = 'return [';
                            $counter = 0;
                                  foreach ($week_ends as $innerArray) {

                                      $counter++;
                        if (is_array($innerArray)){

                            foreach ($innerArray as $value) 
                                {
                                            $return .= "'".$value."',";
                                        }

                                    }

                                }     
                          $return=rtrim($return, ",");
                          $return .= "]";
                          
                          if(is_null($this->input->post('we')))
                            echo $return;
                          else 
                              echo "return ['".$this->input->post('we')."']";

                            ?>
                    
                    }

var container = document.getElementById('example');

var startdate = new Date();

var hot = new Handsontable(container, {
  data: getprojectData(),
  colHeaders: ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total','Delete'],
  
    columns: [
      {type: 'dropdown', source:[<?php echo "'".$this->session->userdata('emp_key')."'" ?>]},
      {
          type: 'dropdown',
          source: getweekend(),
          strict: true,
          allowInvalid: false
//          type: 'date',
//          dateFormat: 'YYYY-MM-DD',
//          correctFormat: true,
         // defaultDate: startdate
          
      },

      {
        type: 'autocomplete',
        source: getprojectlist(),//['PHIL_180', 'PHIL_181', 'PHIL_182', 'PHIL_183', 'PHIL_184', 'PHIL_185', 'PHIL_186', 'PHIL_187']
         strict: true,
         allowInvalid: false
        },
      {
          type: 'autocomplete',
        source: getprojectTasks()
      },
      {},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {type: 'numeric',format: '0.0',},
      {
        //data: 'delete',
        type: 'checkbox'
      }
    ],
  //minSpareRows: 1,
  rowHeaders: true,
  //colHeaders: false,
  contextMenu: true,
  columnSorting: true,
  formulas: true
});

//  function bindDumpButton() {
//      if (typeof hot === "undefined") {
//        return;
//      }
//  
//      hot.Dom.addEvent(document.body, 'click', function (e) {
//  
//        var element = e.target || e.srcElement;
//  
//        if (element.nodeName == "BUTTON" && element.name == 'dump') {
//          var name = element.getAttribute('data-dump');
//          var instance = element.getAttribute('data-instance');
//          var hot = window[instance];
//          console.log('data of ' + name, hot.getData());
//        }
//      });
//    }
      //bindDumpButton();
// $("#searchForm").submit(function( event ) {
//
//  event.preventDefault();
//
//  var $form = $( this ),
//    url = $form.attr( "action" );
//
//  var post = JSON.stringify({"data":hot.getData()});
//  var posting = $.post( url, post );
//
//  posting.done(function( data ) {
//    console.log(post);
//  });
//});


//$("#searchForm").click(function () {
//
//var myData = hot.getData();
//myData = JSON.stringify(myData);
//$.ajax({
//url: "index.php/welcome/proto",
//type: "POST",
//contentType: 'application/json',
//data: { "data": hot.getData() },
//dataType: 'json',
//success: function (data) {
//alert(data);
//}
//});
//});

//$("searchForm").click(function(){
//    
//    $.post("index.php/welcome/proto", function(data, status){
//        alert("Data: " + data + "\nStatus: " + status);
//    });
//});


document.getElementById("searchForm").onsubmit = function() {myFunction()};
function myFunction() {
    /*console.log(hot.getData())
    alert("The form was submitted and table data is "+hot.getData());*/
    // document.getElementById("searchForm").innerHTML = hot.getData();  
     document.searchForm.total.value = JSON.stringify(hot.getData());  
        
}




        </script>
        
         </form>
      
</body>
</html>