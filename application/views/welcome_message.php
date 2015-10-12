<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to timesheets 1.0</title>

        <script src="<?php  echo base_url().'assets/dist/handsontable.full.js' ?>"></script>
<!--        <script src="<?php //echo base_url().'assets/js/jquery.min.js' ?>"></script>
-->        <link rel="stylesheet" media="screen"  href="<?php echo base_url().'assets/dist/handsontable.full.css' ?>">
<!--        <link rel="stylesheet" media="screen" href="http://handsontable.com/dist/handsontable.full.css">-->
     



</head>
<body>


    <div id="example"></div>
    
    
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


        </script>
</body>
</html>