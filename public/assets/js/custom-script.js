   document.getElementById('dot_number').addEventListener('input', function() {
      var inputValue = this.value;
      // Remove non-numeric characters
      inputValue = inputValue.replace(/\D/g, '');
      // Ensure the input length is exactly 10 digits
      if(inputValue.length > 10) {
         this.value = inputValue.slice(0, 10);
      } else {
         this.value = inputValue;
      }
   });


  