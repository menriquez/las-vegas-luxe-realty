var lastTargetMain; // used to track the state
var lastTargetSub;


function toggler(title, parentOfTitle, childOfParent, event,lastTarget) {
  //title = this, the title that's being clicked
  //parentOfTitle = what contains the title and the rest of the accordion object
  //childOfParent = what's being toggled on the click
  var thisParentItem = $(title).parent(parentOfTitle)
  var allAccordionObjects = document.querySelectorAll(childOfParent);
  //If the current target is also the last target: toggle that target back to hidden and clear the last target
  if(event.target === lastTarget) {
    thisParentItem.children(childOfParent).slideToggle("display")
  }
  //Else: hide all other accordion objects, then open the targeted 
  else {
   $(allAccordionObjects).hide("display")
    thisParentItem.children(childOfParent).slideToggle("display")
    //return the current target to the state
    return event.target
  }

}

//Object toggle
//Toggles display on the .accordion-object-casscade each time  .accordion-object-title is clicked
$('.accordion-object-title').on('click', function(event) {
  var toggleMain = toggler(this,'.accordion-object',".accordion-object-casscade",event, lastTargetMain)
  lastTargetMain = toggleMain
})


//Subobject toggle
//Toggles display on .accordion-item-subobject each time .accordion-item-subobject-title is clicked
$('.accordion-item-subobject-title').on('click',function(event) {
  var toggleSub = toggler(this,'.accordion-item',".accordion-item-subobject",event,lastTargetSub)
  lastTargetSub = toggleSub
})
