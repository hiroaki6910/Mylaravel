import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class ToMessage extends Component {
    
    constructor() {
        super();

        this.state = {
            tomessage: []
        };
    }
    componentDidMount() {
        axios
            .get('/api/message_react')
            .then(response => {
                this.setState({tomessage: response.data});
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }
    render() {
        return (
                <div>
                    {this.state.tomessage}
                </div>
        );
    }
}


if (document.getElementById('tomessage')) {
    ReactDOM.render(<ToMessage />, document.getElementById('tomessage'));
}
