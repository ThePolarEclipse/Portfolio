      <?php include '../php/menu.php'; ?>
            <div id="banner">
                <img src="../media/background.jpg" alt"Background image" class="banner-image">
                <h1 class="effect-type centered">I'm Richard Searle</h1>
                <h2 class="effect-type centered">Coding Examples</h2>

                <a href="#bottom" class="centered hide-lessthanS">Scroll Down<br>vvv</a>
            </div>
        </header>
        <main>
            <div class="container container-page">
                <h1>HTML</h1>
                <p>The code below is what I used to create a burger menu without the use of JS.</p>
                <pre><code>&lt;details id="burger-menu"&gt;
        &lt;summary class="btn-hamburger icon icon-hamburger"&gt;&lt;/summary&gt;
        &lt;div class="container"&gt;
            &lt;h2&gt;&lt;a href="internal-pages/about-me.php"&gt;About Me&lt;/a&gt;&lt;/h2&gt;
            &lt;h2&gt;&lt;a href="#project-list"&gt;My Portfolio&lt;/a&gt;&lt;/h2&gt;
            &lt;h2&gt;&lt;a href="internal-pages/coding-examples.php"&gt;Coding Examples&lt;/a&gt;&lt;/h2&gt;
            &lt;h2&gt;&lt;a href="internal-pages/scs-scheme.php"&gt;SCS Scheme&lt;/a&gt;&lt;/h2&gt;
            &lt;div&gt;
                &lt;h2&gt;&lt;a href="#get-in-touch"&gt;Contact Me&lt;/a&gt;&lt;/h2&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/details&gt;</code></pre>
                <h1>SCSS</h1>
                <p>This code is what I like to use across projects for dynamic viewports. It has a couple different ways to check the current viewport and allows me to edit elements based on very specific factors.</p>
                <pre><code>//not that viewport
    @mixin not-viewport($breakpoint) {
      @if $breakpoint == XS {
        @media (min-width: 280px) { @content; }
      } @else if $breakpoint == S {
        @media (max-width: 567px), (min-width: 768px) { @content; }
      } @else if $breakpoint == M {
        @media (max-width: 768px), (min-width: 992px) { @content; }
      } @else if $breakpoint == L {
        @media (max-width: 992px), (min-width: 1200px) { @content; }
      } @else if $breakpoint == XL {
        @media (max-width: 1200px) { @content; }
      }
    }

    //is that viewport
    @mixin is-viewport($breakpoint) {
      @if $breakpoint == XS {
        @media (max-width: 280px) { @content; }
      } @else if $breakpoint == S {
        @media (min-width: 567px) and (max-width: 768px) { @content; }
      } @else if $breakpoint == M {
        @media (min-width: 768px) and (max-width: 992px) { @content; }
      } @else if $breakpoint == L {
        @media (min-width: 992px) and (max-width: 1200px) { @content; }
      } @else if $breakpoint == XL {
        @media (min-width: 1200px) { @content; }
      }
    }

    //is less than that viewport
    @mixin less-viewport($breakpoint) {
      @if $breakpoint == XS {
        @media (max-width: 280px) { @content; }
      } @else if $breakpoint == S {
        @media (max-width: 567px) { @content; }
      } @else if $breakpoint == M {
        @media (max-width: 768px) { @content; }
      } @else if $breakpoint == L {
        @media (max-width: 992px) { @content; }
      } @else if $breakpoint == XL {
        @media (max-width: 1200px) { @content; }
      }
    }

    //is more than that viewport
    @mixin more-viewport($breakpoint) {
      @if $breakpoint == XS {
        @media (min-width: 281px) { @content; }
      } @else if $breakpoint == S {
        @media (min-width: 568px) { @content; }
      } @else if $breakpoint == M {
        @media (min-width: 769px) { @content; }
      } @else if $breakpoint == L {
        @media (min-width: 993px) { @content; }
      } @else if $breakpoint == XL {
        @media (min-width: 1201px) { @content; }
      }
    }</code></pre>
                <h1>JavaScript</h1>
                <p>The JavaScript below is how I have validated my form at the bottom of my contact page. It ensures every field is not empty and that the email is valid before allowing anything to be sent.</p>
                <pre><code>function validateForm() {
    const fields = [
        { id: 'email-firstname', name: 'First Name' },
        { id: 'email-lastname', name: 'Last Name' },
        { id: 'email-address', name: 'Email Address', type: 'email' },
        { id: 'email-subject', name: 'Subject' },
        { id: 'email-message', name: 'Message' }
    ];

    for (let field of fields) {
        let value = document.getElementById(field.id).value.trim();

        if (!value) {
            alert(`${field.name} is required.`);
            return false;
        }

        if (field.type === 'email') {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                alert(`Please enter a valid ${field.name}.`);
                return false;
            }
        }
    }

    return true;
}</pre></code>
                <p>This script provides a robust framework for animating Pok&eacute;mon layers in Wallpaper Engine, featuring dynamic function creation, optional path visualization, and comprehensive error checking. Its design allows for flexible and scalable animation sequences, making it a powerful tool for creating animated wallpapers with complex movements and interactions.</p>
                <pre><code>'use strict';//keeps things safe
//------------------------------------------------------------------------------------------------
//IMPORTANT

//You need to name your layers as such:
//  *pokemon*-*action*(*direction*)

//You should end up with something like this:
//  mudkip-walk(W)

//What you name your layer is how you will reference it when deciding what layer you want to be shown.
//For instance, mudkip-walk(W) would be:
//  walkW

//keep in mind that you will need to search through this file to make sure all your new names match
//-------------------------------------------------------------------------------------------------

var startPos;
const timer = 800; //determines length of your animations cycle. 30 = 1 real second (if you want a big loop between multiple pokemon then keep this value the same for them all)
var showPath = false; //(default: false) this will show red cubes that help you to see what path your pokemon will travel to speed up testing
let curTime; //This is what manages the time system
let actionNum = 0; //how far along in your movement array the pokemon is. Change this to test later within your movement array
const speedMultiplier = 1; //(default: 1) use this to test your movement array quicker. Setting too high can cause issues 
let actions = [];
let layerNames = [];

export function init(value) {
  for (let i = 0; i < thisScene.getLayerCount(); i++) {
    if (thisScene.getLayer(i).name.split('-')[0] == thisLayer.name.split('-')[0]){
      layerNames[i] = thisScene.getLayer(i).name;
    }
  }
  layerNames = layerNames.filter(name => name !== undefined && name !== null && name.trim() !== "");
  layerNames = layerNames.splice(1);
  //creates functions using the image layers names
  for (let i = 0; i < layerNames.length; i++) {
    const regex = /-(\w+)\((\w+)\)/;
    const match = layerNames[i].match(regex);
    const functionName = match[1] + match[2];
    const layerName = layerNames[i]; // declare layerName with const to capture its current value
    globalThis[functionName] = function() {
      updateLayer.call(this, layerName,  true);
    };
  }
  layerNames.forEach(name => {
    const layer = thisScene.getLayer(name);
    layer.visible = false;
	layer.origin = new Vec3(0,0,0);
    layer.getTextureAnimation().setFrame(0);
  });
  //This is the movement array. You will be here the most. Add new movements here and be sure to get comfortable with it.
  //Be sure that the final end value is the same as the timer variable otherwise the loop breaks.
  actions = [  
        [100, moveE, walkE, 1.5],
        [100, moveSE, walkSE, 1.5],
        [100, moveS, walkS, 1.5],
        [100, moveSW, walkSW, 1.5],
        [100, moveW, walkW, 1.5],
        [100, moveNW, walkNW, 1.5],
        [100, moveN, walkN, 1.5],
        [100, moveNE, walkNE, 1.5],
  ].map(([end, direction, anim, speed, setPosition]) => ({end, direction, anim, speed,setPosition}));

  startPos = thisLayer.origin;

  for (let i = 0; i < actions.length; i++) { //For testing purposes
    actions[i].end = actions[i].end / speedMultiplier;
    actions[i].speed = actions[i].speed * speedMultiplier;
  }

  for (let i = 1; i < actions.length; i++) { //combines lengths of the actions so the code can run through them
    actions[i].end = actions[i-1].end + actions[i].end;
  }

  //makes path points
  if (showPath == true){
    let pathPos = startPos; 
    var path = thisScene.getLayer("path_0");
    path.origin = startPos;
    path.visible = true;

    var connector = thisScene.getLayer("connector_0");
    connector.origin = startPos;
    connector.visible = true;

    var last_point_x = pathPos.x;
    var last_point_y = pathPos.y;

    for (let i = 0; i < actions.length; i++) {

      if (actions[i].setPosition != null){
        pathPos = actions[i].setPosition;
      }
      actions[i].anim();
      const dir = actions[i].direction;
      const xDelta = (dir == moveW || dir == moveNW || dir == moveSW) ? -1 : ((dir == moveE || dir == moveNE || dir == moveSE) ? 1 : 0);
      const yDelta = (dir == moveS || dir == moveSW || dir == moveSE) ? -1 : ((dir == moveN || dir == moveNW || dir == moveNE) ? 1 : 0);
      const xSpeed = (dir == moveNW || dir == moveNE || dir == moveSW || dir == moveSE) ? actions[i].speed / 1.5 : actions[i].speed;
      const ySpeed = (dir == moveNW || dir == moveNE || dir == moveSW || dir == moveSE) ? actions[i].speed / 2 : actions[i].speed;
      const deltaTime = (i == 0) ? actions[i].end : (actions[i].end - actions[i - 1].end);
      var connector_point_final = new Vec3(pathPos.x + ((xDelta * xSpeed * deltaTime)/2), pathPos.y + ((yDelta * ySpeed * deltaTime)/2), 0);
      pathPos = new Vec3(pathPos.x + (xDelta * xSpeed * deltaTime), pathPos.y + (yDelta * ySpeed * deltaTime), 0);
      hideLayers();

      var new_point_x = pathPos.x;
      var new_point_y = pathPos.y;

      var x_path = Math.abs(last_point_x - new_point_x)
      var y_path = Math.abs(last_point_y - new_point_y)

      var z_path = (x_path === 0) ? ((y_path === 0) ? 0 : y_path) : ((y_path === 0) ? x_path : Math.sqrt(x_path ** 2 + y_path ** 2));

      last_point_x = new_point_x;
      last_point_y = new_point_y;
      
      var connector_dupe = thisScene.createLayer(thisScene.getInitialLayerConfig("connector_0"));
      connector_dupe.origin = connector_point_final;
      connector_dupe.visible = true;
      thisScene.sortLayer(connector_dupe,thisScene.getLayerIndex(thisLayer)-2);

      var path_dupe = thisScene.createLayer(thisScene.getInitialLayerConfig("path_0"));
      path_dupe.origin = pathPos;
      path_dupe.visible = true;
      thisScene.sortLayer(path_dupe,thisScene.getLayerIndex(thisLayer)-1);

      connector_dupe.scale = new Vec3(z_path/5,0.5,1);

      if (actions[i].direction == moveS || actions[i].direction == moveN){
        connector_dupe.angles =  new Vec3(0,0,90);
      } else if (actions[i].direction == moveNW || actions[i].direction == moveSE){
        connector_dupe.angles =  new Vec3(0,0,-37);
      } else if (actions[i].direction == moveNE || actions[i].direction == moveSW){
        connector_dupe.angles =  new Vec3(0,0,37);
      }
      if (actions[i].anim == animNo) {
        connector_dupe.scale = new Vec3(0,0,0);
      }
    }
  }

  //this is the code that tries to guess where the pokemon would be if you're testing and don't start at the first action
  
  let editingPos = startPos;
  for (let i = 0; i <= actionNum; i++){
    if (actionNum == 0){
      curTime = 0;
    } else {
      curTime = actions[actionNum].end - (actions[actionNum].end-actions[actionNum-1].end);
    }
  }
  for (let i = 0; curTime >= actions[i].end; i++) {
    if (actions[i].setPosition != null){
      editingPos = actions[i].setPosition;
    }
    actions[i].anim();
    const dir = actions[i].direction;
    const xDelta = (dir == moveW || dir == moveNW || dir == moveSW) ? -1 : ((dir == moveE || dir == moveNE || dir == moveSE) ? 1 : 0);
    const yDelta = (dir == moveS || dir == moveSW || dir == moveSE) ? -1 : ((dir == moveN || dir == moveNW || dir == moveNE) ? 1 : 0);
    const xSpeed = (dir == moveNW || dir == moveNE || dir == moveSW || dir == moveSE) ? actions[i].speed / 1.5 : actions[i].speed;
    const ySpeed = (dir == moveNW || dir == moveNE || dir == moveSW || dir == moveSE) ? actions[i].speed / 2 : actions[i].speed;
    const deltaTime = (i == 0) ? actions[i].end : (actions[i].end - actions[i - 1].end);
    editingPos = new Vec3(editingPos.x + (xDelta * xSpeed * deltaTime), editingPos.y + (yDelta * ySpeed * deltaTime), 0);
    hideLayers();
  }
  thisLayer.origin = editingPos;
  
  //error checking
  const largestEndValue = Math.max(...actions.map(action => action.end));
  if (largestEndValue < timer) {
    console.error(thisLayer.name);
    console.error(largestEndValue ," / ",timer);
    console.error(timer - largestEndValue);
    console.error('The largest end value is smaller than the timer.');
    console.error('Either add to the final end value in your movement array or add a new entry that has no movement and no animation. You could also just shorten your timer value to match your end value.');

  } else if (largestEndValue >timer){
    console.error(thisLayer.name);
    console.error(largestEndValue ," / ",timer);
    console.error(timer - largestEndValue);
    console.error('The largest end value is larger than the timer.');
    console.error('Cut down your end values to be equal to your timer or increase your timer.');
  }
}

// This is stuff you don't need to touch. Feel free to look around and get a grasp of it
//LAYERS------------------------------------------------------------------------------------
export function hideLayers() { 
  layerNames.forEach(name => {
    const layer = thisScene.getLayer(name);
    layer.visible = false;
    layer.getTextureAnimation().setFrame(0);
  });
}

function updateLayer(layerName, visible) {
    const layer = thisScene.getLayer(layerName);
    layer.visible = visible;
}
export function animNo(value) { //This is used to set your current animation to nothing. Useful for when you want the pokemon to be invisble before coming out of somewhere like a door/cave
  hideLayers()
}

//LOOP SYSTEM----------------------------------------------------------------------------------
export function update(value) {
  
        curTime += 1; //ensures the flow of time 
        if (curTime == timer){ //resets the loop 
                curTime = 0; 
                thisLayer.origin = startPos; //resets position (feel free to remove this if you don't need it)
                hideLayers(); //hides all the layers
                actionNum = 0; //returns your movement array to its first entry
        }
  //handles movement/teleportation and animation. 
  actions[actionNum].direction();
  actions[actionNum].anim();
  thisLayer.origin = actions[actionNum].setPosition;

  if (curTime == actions[actionNum].end - 1 && curTime != timer-1){ //goes to the next entry in your movement array
    hideLayers();
    actionNum += 1;
    actions[actionNum].anim();
  }
        
}
//DIRECTIONS---------------------------------------------------------------------------------------------
function moveNo() {
  // No movement. Call this when you want a pokemon to stop moving. (Idle/teleported/emoting)
}
function move(deltaX, deltaY) {
  const { x, y } = thisLayer.origin;
  thisLayer.origin = new Vec3(x + deltaX, y + deltaY, 0);
}
function moveW(value) {
  move(-actions[actionNum].speed, 0);
}
function moveE(value) {
  move(actions[actionNum].speed, 0);
}
function moveS(value) {
  move(0, -actions[actionNum].speed);
}
function moveN(value) {
  move(0, actions[actionNum].speed);
}
function moveNW(value) {
  move(-actions[actionNum].speed / 1.5, actions[actionNum].speed / 2);
}
function moveNE(value) {
  move(actions[actionNum].speed / 1.5, actions[actionNum].speed / 2);
}
function moveSW(value) {
  move(-actions[actionNum].speed / 1.5, -actions[actionNum].speed / 2);
}
function moveSE(value) {
  move(actions[actionNum].speed / 1.5, -actions[actionNum].speed / 2);
}</pre></code>
<h1>Laravel</h1>
<p>This Laravel Blade template defines a form for adding a new employee. It extends the layouts.app layout and is part of a view rendered within a Bootstrap-styled container.</p>
<pre><code>&#64;extends('layouts.app')

&#64;section('content')
    &lt;div class="container"&gt;
        &lt;div class="col-md-9 col-lg-7 mx-auto form-bg py-4 px-4 rounded"&gt;
            &lt;form action="&#123;&#123; route('employee.store') &#125;&#125;" method="post"&gt;
                &#64;csrf

                &lt;h2 class="mb-4 mt-1"&gt;Add Employee&lt;/h2&gt;
                &lt;x-input name="first_name" label="First Name &lt;span class='text-danger'&gt;*&lt;/span&gt;" /&gt;
                &lt;x-input name="last_name" label="Last Name &lt;span class='text-danger'&gt;*&lt;/span&gt;" /&gt;
                &lt;x-floating name="company_id" label="Company"&gt;
                    &lt;select
                        class="form-select &#123;&#123; $errors->has('company_id')? 'is-invalid' : '' &#125;&#125;"
                        name="company_id"
                        id="company_id"
                    &gt;
                        &lt;option 
                            value=""
                            &#123;&#123; empty(old('company_id', $company_id))? 'selected' : '' &#125;&#125;
                        &gt;No Company / Free Agent&lt;/option&gt;
                        &#64;foreach (&#92;App&#92;Models&#92;Company::all() as $company)
                            &lt;option 
                                value="&#123;&#123; $company->id &#125;&#125;"
                                &#123;&#123; old('company_id', $company_id) == $company->id? 'selected' : '' &#125;&#125;
                            &gt;&#123;&#123; $company->name &#125;&#125;&lt;/option&gt;
                        &#64;endforeach
                    &lt;/select&gt;
                &lt;/x-floating&gt;
                &lt;x-input name="email" label="Email" /&gt;
                &lt;x-input name="telephone" label="Phone Number" /&gt;
                
                &lt;button
                    type="submit"
                    class="btn btn-primary"
                &gt;
                    Submit
                &lt;/button&gt;
                
            &lt;/form&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&#64;endsection
</code></pre>

            </div>
        </main>
        <?php include '../php/footer.php'; ?>