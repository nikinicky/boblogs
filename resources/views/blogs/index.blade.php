  @extends ('layouts.main')
  @section ('content')
  <ul class="posts">
    @for($i=1; $i<=5; $i++)
    <li>
      <h2>Post Title</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse laborum ea possimus dolorum sed odit, offic
    </li>
    @endfor
  </ul>
  @stop
