// Select the input field and the table
const pricebtn=document.getElementById('asc');
const datebtn=document.getElementById('date');
const div = document.getElementById("request-list");


function sortChildElements(compareFunction) {
    // Get an array of the child elements
    const childElements = Array.from(div.children);
    // Sort the child elements based on the compareFunction
    childElements.sort(compareFunction);
    // Append the sorted child elements back to the div
    childElements.forEach(child => div.appendChild(child));
}

pricebtn.addEventListener('click', () => {
    // Define a compare function to sort by ascending order
    const compareFunction = (a, b) => {
      const aValue = parseFloat(a.querySelector('.price').value);
      const bValue = parseFloat(b.querySelector('.price').value);
      return aValue - bValue;
    };
    // Sort the child elements in ascending order
    sortChildElements(compareFunction);
  });

  datebtn.addEventListener('click', () => {
    // Define a compare function to sort by ascending order
    const compareFunction = (a, b) => {
      const aValue = new Date(a.querySelector('.date').value);
      const bValue = new Date(b.querySelector('.date').value);
      return bValue - aValue;
    };
    // Sort the child elements in ascending order
    sortChildElements(compareFunction);
  });

