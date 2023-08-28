document.getElementById('desktop-searchbar').addEventListener('click', function(event) {
    var expandedState = document.querySelector('.expanded-state');
    var defaultState = document.querySelector('.default-state');
  
    if (expandedState.style.display === 'none' || expandedState.style.display === '') {
      expandedState.style.display = 'flex';
      defaultState.style.display = 'none';
    }
  
    // Prevents the click event from propagating to the document
    event.stopPropagation();
  });
  
  // Listen for click events on the entire document
  document.addEventListener('click', function() {
    var expandedState = document.querySelector('.expanded-state');
    var defaultState = document.querySelector('.default-state');
  
    // Revert to the default state
    expandedState.style.display = 'none';
    defaultState.style.display = 'block';
  });
  
  // Optional: To prevent clicks within the expanded-state from reverting to the default state
  document.querySelector('.expanded-state').addEventListener('click', function(event) {
    event.stopPropagation();
  });

//attach input to whole div
  document.addEventListener("DOMContentLoaded", function() {
    // For arrival date
    document.querySelector('.arrival-searchbar').addEventListener('click', function() {
        this.querySelector('input.date-picker[name="arrival_date"]').focus();
    });

    // For departure date
    document.querySelector('.departure-searchbar').addEventListener('click', function() {
        this.querySelector('input.date-picker[name="departure_date"]').focus();
    });

    // For travelers
    document.querySelector('.traveller-searchbar').addEventListener('click', function() {
        this.querySelector('input[name="travelers"]').focus();
    });
});
