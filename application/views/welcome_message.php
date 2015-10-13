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

</head>
<body>

<?php 
$attributes = array( 'id' => 'searchForm','name' => 'searchForm' );


echo form_open('welcome/proto',$attributes); ?>
    
     <div id="example"></div>
     
     <input type="hidden" name="total" value="">
     
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
     
     
      <script type ="text/javascript" >
            
function getprojectData() {
    
        return [
  
  ["TC","10/03/15","PHIL_180","Programming","Programming", 1, 1, 2, 3, 3, 5, 1, 16],
  ["TC","10/03/15","PHIL_180","Programming","Programming", 2, 1, 1, 1,1, 2, 3, 11],
  ["TC","10/03/15","PHIL_180","Programming","Programming", 3, 5, 1, 1, 2, 1, 1, 14]
]
};

function getprojectTasks(projectids) {
    console.log(projectids);
   var arr =  [
       ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total'],
            ['save data', 'data erase', 'data dump', 'create links', 'project management', 'data cross', 'call', 'Meetings']];
        return  arr[projectids];
  
            
  
  
               };

var container = document.getElementById('example');

var hot = new Handsontable(container, {
  data: getprojectData(),
  colHeaders: ['EMP_key', 'W.E', 'Project #', 'Task','Task Description','S','M','T','W','T','F','S','Total'],
  
    columns: [
      {type: 'dropdown', source:['TC']},
      {
          type: 'date',
          dateFormat: 'MM/DD/YY',
          correctFormat: true,
          defaultDate: '01/01/1900'
          
      },

      {
        type: 'autocomplete',
        source: ['PHIL_180', 'PHIL_181', 'PHIL_182', 'PHIL_183', 'PHIL_184', 'PHIL_185', 'PHIL_186', 'PHIL_187']
      },
      {
          type: 'autocomplete',
        source: getprojectTasks(1)
      },
      {},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'},
      {type: 'numeric'}
    ],
  minSpareRows: 1,
  rowHeaders: true,
  //colHeaders: false,
  contextMenu: true,
  columnSorting: true
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