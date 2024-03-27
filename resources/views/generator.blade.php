<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Generate Password</title>
</head>
<body>

  <div class="container-fluid text-center">

    <div class="pricing-header px-3 py-3 pt-md-1 pb-md-2 mx-auto text-center">
    
      <h1 class="display-4">Strong Password Generator</h1>
      
    </div>

    <form action="submit" method="POST">
      @csrf
             <div class="mb-3">
               <label for="symbols" class="form-label">
                 Include Symbols: ( e.g. @#$% )
                 <input type="checkbox" name="passArr[]" id="symbols" value="1">
               </label>
             </div>
            
             
             <div class="mb-3">
               <label for="numbers" class="form-label">
                 Include Numbers: ( e.g. 123456 )
                 <input type="checkbox" name="passArr[]" id="numbers" value="2">
               </label>
             </div>
             

             <div class="mb-3">
               <label for="lowercharacters" class="form-label">
                 Include Lowercase Characters: ( e.g. abcdefgh )
                 <input type="checkbox" name="passArr[]" id="lowercharacters" value="3">
               </label>
             </div>
            

             <div class="mb-3">
               <label for="UpperCharaters" class="form-label">
                 Include Uppercase Characters:
                  <input type="checkbox" name="passArr[]" id="UpperCharaters" value="4">
                </label>
             </div>
             

             <div class="mb-3">
               <label for="length" class="form-label">
                Password Length:
                <input type="number" name="length" required min="1" id="length" placeholder="Type a Number">
               </label>
             </div>

             <input type="submit" name="submit" value="Generate Password " />
      </form>
      <p id="displayPass"></p>
  </div>

</body>
</html>
