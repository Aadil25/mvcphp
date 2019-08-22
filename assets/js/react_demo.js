import React, { Component } from 'react';  
class Application extends React.Component {
  render() {
    return (
    <div>
      <h1>Hello World!</h1>
      <p>
        More info <a href="https://www.google.co.in/" target="_blank">here</a>.
      </p>
    </div>
    );
  }
}

ReactDOM.render(
   <Application />, 
   document.getElementById('app')
);