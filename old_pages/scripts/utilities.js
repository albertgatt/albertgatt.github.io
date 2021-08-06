
//displaySection
function displaySection ( id ) {
  var sections = new Array( 'about', 'links', 'publications', 'research', 'contact' );
  for ( var i = 0; i < sections.length; i++ )
    {
      currSection = sections[i];
      
      if(currSection != null) 
      {
      	document.getElementById( currSection ).style.display = "none";
      }
    }
    
  document.getElementById( id ).style.display = "block";
}

//spam-resistent mail adress
function mailAddress( recipient, domain, theme ) {
  var addString = new String( recipient + '@' + domain );
  document.write( '<a href="mailto:' + addString + '">' + theme + '</a>' );
}

