class Draggie {
  /**
   * @constructor
   * @param {HTMLElement} element
   * @param {HTMLElement} targetElement
   */
  constructor(element, targetElements) {
    this.element = element;
    this.targetElements = targetElements;
    this.targetElement = targetElements[0];
    this.graphic = element.querySelector('a');
    this.drag = new Draggabilly(this.element, {
  });
    
    this._dragClass = 'is-dragging';
    this._targetHoverClass = 'hovering';
    this._isTransitioningClass = 'transitioning';
  }
  
  /**
   * init.
   */
  init() {
    this._addEventListeners();
  }
  
  /**
   * Add event listeners.
   * @private
   */
  _addEventListeners() {
    this._boundDragStart = (pointer) => this._dragStartHandler(pointer);
    this._boundDragMove = (pointer) => this._dragMoveHandler(pointer);
    this._boundDragEnd = (pointer) => this._dragEndHandler(pointer);
    this.drag.on('dragStart', this._boundDragStart);
    this.drag.on('dragMove', this._boundDragMove);
    this.drag.on('dragEnd', this._boundDragEnd);
  }
  
  /**
   * Drag start handler.
   * @param {Object} pointer
   * @private
   */
  _dragStartHandler(pointer) {
    this.isDragging = true;
    document.body.classList.add(this._dragClass);
    this.element.style.zIndex = 1;
    if ($(this.element).hasClass('repo_tag')){
    	var null_target = $(this.element).parent().find('.target').attr('id');
    	$('.target:not(#' + null_target + ')').css('height', '30px');
    	$('.target:not(#' + null_target + ')').css('display', 'inline-block');
    }
    else if ($(this.element).hasClass('slide_name')){
    	$('#slides_area .target').css('height', '30px');
    	$('#slides_area .target').css('display', 'inline-block');
    	var slide_id = $(this.element).parent().attr('id');
    	for(var i = 0; i < this.targetElements.length; i++){
    		if ($(this.targetElements[i]).attr('id') == slide_id){
    			$(this.targetElements[i]).hide();
    		}
    	}
    }
  }
  
  /**
   * Drag move handler.
   * @param {Object} pointer
   * @private
   */
  _dragMoveHandler(pointer) {
    if (this._checkIfCursorOnTarget(pointer)) {
      this.targetElement.classList.add(this._targetHoverClass);
    } else {
      this.targetElement.classList.remove(this._targetHoverClass);
    }
  }
  
  /**
   * Drag end handler.
   * @param {Object} pointer
   * @private
   */
  _dragEndHandler(pointer) {
    if (this._checkIfCursorOnTarget(pointer)) {
      this._droppedOnTarget();
    } else {
      this._resetElementPosition();
      this.targetElement.classList.remove(this._targetHoverClass);
    }
    document.body.classList.remove(this._dragClass);
    if ($(this.element).hasClass('repo_tag')){
    	var null_target = $(this.element).parent().find('.target').attr('id');
    	$('.target:not(#' + null_target + ')').css('height', '0px');
    	$('.target:not(#' + null_target + ')').css('display', 'none');
    }
    else if ($(this.element).hasClass('slide_name')){
    	$('#slides_area .target').css('height', '0px');
    	$('#slides_area .target').css('display', 'none');
    }
  }
  
  /**
   * Check if the drag element was dropped on the target area.
   * @param {Object} pointer
   * @returns {Boolean}
   * @private
   */
  _checkIfCursorOnTarget(pointer) {
  	var flag = false;

    for( i = 0; i < this.targetElements.length; i++ ){
    	const targetLocation = this.targetElements[i].getBoundingClientRect();
    	const targetX = targetLocation.left + targetLocation.width;
    	const targetY = targetLocation.top + targetLocation.height;
    	const x = pointer.x;
    	const y = pointer.y;
    
	    if (x >= targetLocation.left && x <= targetX &&
	        y >= targetLocation.top && y <= targetY) {
	      flag = true;
	      this.targetElement = this.targetElements[i];
	      //console.log(this.element);
	    } else {
	      //flag = false;
	    }
	}
	return flag;
  }
  
  /**
   * Dropped on target!
   * @private
   */
  _droppedOnTarget() {
  	if ($(this.element).hasClass('repo_tag')){
  		var action_menu = $("<div id='action_menu'><ul><li id='move_tag'>Move</li><li id='copy_tag'>Copy</li></ul></div>");
  		$(this.element).append(action_menu);
  		$(this.element).attr('from', $(this.element).parent().find('.target').attr('id'));
  		$(this.element).attr('to', $(this.targetElement).attr('id'));
  	}
  	else if ($(this.element).hasClass('slide_name')){
  		var slide_id = $(this.element).parent().attr('id');
  		var new_order = $(this.targetElement).attr('data-order');
  		var old_order = $(this.element).parent().attr('data-order');
  		var slide_bumped = $(this.targetElement).attr('id');
  		var parameters = { 'slide_id' : slide_id, 'new_order' : new_order, 'slide_bumped' : slide_bumped, 'old_order' : old_order };
		$.ajaxSetup({
			headers: {
		  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type : 'POST',
			url : 'http://' + project_domain + '/pages/safety/training/slides/reorder_slide',
			data : parameters,
			dataType: 'json',
			error:function(data){ 
	            console.log(data.responseJSON);
	        },
			success : function(data){
				window.location.reload();
			}
		});
		for(var i = 0; i < this.targetElements.length; i++){
    		$(this.targetElements[i]).show();
    	}
  	}
  }
  
  /**
   * Animate the element back to its original position (by adding a class).
   * @private
   */
  _resetElementPosition() {
    this._boundElementBackInPlace = (event) => this._onElementBackInPlace(event);
    this.element.addEventListener('transitionend', this._boundElementBackInPlace);
    
    this.element.classList.add(this._isTransitioningClass);
    this.element.style.left = this.element.style.top = 0;
    if ($('#action_menu').length){
    	$("#action_menu").remove();
    }
  }
  
  /**
   * Remove the animation class and dispose the eventlistener.
   * @private
   */
  _onElementBackInPlace() {
    if (event.target === this.element) {
      this.element.classList.remove(this._isTransitioningClass);
      this.element.removeEventListener('transtionend', this._boundElementBackInPlace);
    }
  }
}

const draggableElems = document.querySelectorAll('.draggable');
const targets = document.querySelectorAll('.target');

for (var i = 0, l = draggableElems.length; i < l; i++) {
  const a = new Draggie(draggableElems[i], targets);
  a.init();
}