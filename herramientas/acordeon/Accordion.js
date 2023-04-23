// Accordion.js
// Javascript Behaviour for the AccordionBehaviour Control
// Copyright (c) by Matthias Hertel, http://www.mathertel.de
// This work is licensed under a BSD style license. See http://www.mathertel.de/License.aspx
// ----- 
// 13.05.2007 created by Matthias Hertel
var AccordionBehaviour = {
  timer: null, // reference to the timer used for the transitions
  
  // ----- Events -----
  onclick: function (evt) {
    evt = evt || window.event;
    if (this.timer == null)
      this.SlideOpen(evt);
  }, // onclick

  // ----- Methods -----
  
  // setup the timer and start the size transitions
  SlideOpen: function (evt) {
    evt = evt || window.event;
    var h, c, obj = evt.srcElement;

    // search the HEADER
    while ((obj != null) && (obj != this) && (obj.className != "VEACCORDIONHEADER"))
      obj = obj.parentNode;
    if ((obj != null) && (obj != this) && (obj.className == "VEACCORDIONHEADER"))
      obj.className = "VEACCORDIONHEADERACTIVE";
    h = obj;
    
    // search the next CONTENT
    while ((obj != null) && (obj != this) && (obj.className != "VEACCORDIONCONTENT"))
      obj = obj.nextSibling;
      
    if ((obj != null) && (obj != this) && (obj.className == "VEACCORDIONCONTENT")) {
      c = obj;
      c.style.height = "0px";
      c.className = "VEACCORDIONCONTENTACTIVE";
      
      // adjustClassNames
      var allElements = this.getElementsByTagName("div");
      for (var n = 0; n < allElements.length; n++) {
        var obj = allElements[n];
        if ((obj.className == "VEACCORDIONHEADERACTIVE") && (obj != h))
          obj.className = "VEACCORDIONHEADER";
        if ((obj.className == "VEACCORDIONCONTENTACTIVE") && (obj != c))
          obj.className = "VEACCORDIONCONTENT";
      } // for
      
      // start sliding...
      this.timer = window.setTimeout(this._resizeItem.bind(this), 5);
    } // if
  }, // SlideOpen
  

  _resizeItem: function (obj) {
    var allElements = this.getElementsByTagName("div");
    var isFinished = true;
    var delta;

    this.timer = null;

    for (var n = 0; n < allElements.length; n++) {
      var obj = allElements[n];
      if (obj.className == "VEACCORDIONCONTENTACTIVE") {
        // enlarge
        delta = obj.scrollHeight - obj.offsetHeight;
        if (delta <= 0) {
          // nothing.
        } else if ((delta <= 2) && (delta > 0)) {
          // snap exactly
          obj.style.height = obj.offsetHeight + "px";
        } else {
          obj.style.height = Math.round(obj.offsetHeight + Math.max(2, Math.min(12, delta/3))) + "px";
          isFinished = false;
        } // if
          
      } else if (obj.className == "VEACCORDIONCONTENT") {
        // shrink
        delta = obj.offsetHeight;
        if (delta <= 0) {
          // nothing.
        } else if (delta <= 2) {
          // snap exactly
          obj.style.height = "0px";
        } else {
          obj.style.height = Math.round(obj.offsetHeight - Math.max(2, Math.min(12, delta/3))) + "px";
          isFinished = false;
        } // if
      }
    } // for
    if (! isFinished)
      this.timer = window.setTimeout(this._resizeItem.bind(this), 20);
  } // _resizeItem
} // AccordionBehaviour
// End
