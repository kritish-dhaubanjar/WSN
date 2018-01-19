var filter = document.forms.filterform;
var sm=0,md=0,lg=0,a=null,b=null,c=null,taupe=null,beige=null,white=null;



var sort = null;
var cat = document.getElementsByClassName('breadcrumb-item')[1].innerHTML;

// load(1,sort);
load(1,sort,cat);
sortList = document.getElementById('sort');
btns = sortList.getElementsByClassName('dropdown-item');

  $("#A").on('click touchstart',function(){
    sort = 'A';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
    document.getElementById('dropdownMenu2').innerHTML = 'Name, A-Z';
  });
  $("#Z").on('click touchstart',function(){
    sort = 'Z';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
    document.getElementById('dropdownMenu2').innerHTML = 'Name, Z-A';
  });
  $("#L").on('click touchstart',function(){
    sort = 'L';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
    document.getElementById('dropdownMenu2').innerHTML = 'Price, low to high';
  });
  $("#H").on('click touchstart',function(){
    sort = 'H';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
    document.getElementById('dropdownMenu2').innerHTML = 'Price, high to low';
  });



var btn = document.getElementById('clear');
$("#clear").on('click touchstart',function(){
  console.log('clear');
  if(filter.small !=null && filter.medium !=null && filter.large !=null){
    filter.small.checked = false;
    filter.medium.checked = false;
    filter.large.checked = false;
  }
  filter.a.checked = false;
  filter.b.checked = false;
  filter.taupe.checked = false;
  filter.beige.checked = false;
  filter.white.checked = false;

  /*Price Sort*/
  filter.a.checked = false;
  filter.b.checked = false;
  filter.c.checked = false;

  // load(1,sort);
  load(1,sort,cat);
});

$("input[name~='small']").on('click touchstart',function(){
  if(filter.small.checked == true){
    sm = 1;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.small.checked == false){
    sm = 0;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='medium']").on('click touchstart',function(){
  if(filter.medium.checked == true){
    md = 1;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.medium.checked == false){
    md = 0;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='large']").on('click touchstart',function(){
  if(filter.large.checked == true){
    lg = 1;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.large.checked == false){
    lg = 0;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

/*Price Sort*/
$("input[name~='a']").on('click touchstart',function(){
  if(filter.a.checked == true){
    a = true;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.a.checked == false){
    a = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='b']").on('click touchstart',function(){
  if(filter.b.checked == true){
    b = true;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.b.checked == false){
    b = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='c']").on('click touchstart',function(){
  if(filter.c.checked == true){
    c = true;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.c.checked == false){
    c = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});
/*Price Sort*/

$("input[name~='taupe']").on('click touchstart',function(){
  if(filter.taupe.checked == true){
    taupe = 'taupe';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.taupe.checked == false){
    taupe = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='beige']").on('click touchstart',function(){
  if(filter.beige.checked == true){
    beige = 'beige';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.beige.checked == false){
    beige = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});

$("input[name~='white']").on('click touchstart',function(){
  if(filter.white.checked == true){
    white = 'white';
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
  else if(filter.white.checked == false){
    white = null;
    filterfxn(1,sm,md,lg,a,b,c,taupe,beige,white,sort);
  }
});