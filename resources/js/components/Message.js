import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class Message extends Component {
    
    constructor() {
        super();

        this.state = {
            message: []
        };
    }
    componentDidMount() {
        axios
            .get('/api/message_react')
            .then(response => {
                this.setState({message: response.data});
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }
    renderPosts() {
        return this.state.message.map(message => {
            return (
                <div key={message.id}>
                    {message.other_user.name}:
                    {message.message.content}:
                    {message.message.created_at}:
                </div>
            );
        });
    }
    render() {
        return (
                <div>
                    {this.renderPosts()}
                    <MessageForm />
                </div>
        );
    }
}

if (document.getElementById('message')) {
    ReactDOM.render(<Message />, document.getElementById('message'));
}
