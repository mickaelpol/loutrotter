$(document).ready(function(){

  new List('test-list', {
    valueNames: ['list'],
    page: 5,
    pagination: true
  });
  
  new List('list-com', {
    valueNames: ['list'],
    page: 3,
    pagination: true
  });

  // pagination admin responsive 
  new List('list-responsive', {
    valueNames: ['list'],
    page: 10,
    pagination: true
  });

});
