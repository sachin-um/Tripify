// Select the input field and the table
const pricebtn=document.getElementById('asc');
const datebtn=document.getElementById('date');
const div = document.getElementById("request-list");


function sortChildElements(compareFunction) {
    const childElements = Array.from(div.children);
    childElements.sort(compareFunction);
    childElements.forEach(child => div.appendChild(child));
}

pricebtn.addEventListener('click', () => {
    const compareFunction = (a, b) => {
      const aValue = parseFloat(a.querySelector('.price').value);
      const bValue = parseFloat(b.querySelector('.price').value);
      return aValue - bValue;
    };
    sortChildElements(compareFunction);
  });

  datebtn.addEventListener('click', () => {
    const compareFunction = (a, b) => {
      const aValue = new Date(a.querySelector('.date').value);
      const bValue = new Date(b.querySelector('.date').value);
      return bValue - aValue;
    };
    sortChildElements(compareFunction);
  });

