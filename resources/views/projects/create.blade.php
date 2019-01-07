<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Create a new project</h1>

    <form method="post" action="/projects">
      {{ csrf_field() }}

      <div>
        <input type="text" name="title" placeholder="Project title">
      </div>

      <div>
        <textarea name="description" placeholder="Project description"><textarea>
      </div>

      <div>
        <button type="submit">Create project</button>
      </div>
    </form>
  </body>
</html>
