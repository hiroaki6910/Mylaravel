import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

var MessageForm = React.createClass({
   render: function() {
     return (
        <form className="messageForm">
        <input type="text" placeholder="Message" />
        <input type="submit" value="Post" />
      </form>
     );
   }
 });

if (document.getElementById('message')) {
    ReactDOM.render(<Message />, document.getElementById('message'));
}
