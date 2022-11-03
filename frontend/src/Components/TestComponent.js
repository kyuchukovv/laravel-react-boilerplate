import React from 'react';
import Api from "../api";

export default class TestComponent extends React.Component {
    state = {
        tests: [],
        amount: 0
    }

    getList = event => {
        Api.get('tests')
            .then(res => {
                const tests = res.data;
                this.setState({tests})
                console.log(this.state.tests)
            })
            .catch((err) => console.log(err));
    }

    handleChange = event => {
        const amount = event.target.value;
        this.setState({amount});
    }

    render() {
        return (
            <>
                <div>Hey</div>
                <div>Here is your list:</div>
                <button onClick={this.getList}>Update</button>
                <ul>
                    <li>hey</li>
                    {
                        this.state.tests.map(person =>
                            <li key={person.id}>Name: {person.id}</li>
                        )
                    }
                </ul>
                <input type="text" name="name" value={this.state.amount} onChange={this.handleChange} />
                <div>Value: {this.state.amount}</div>
            </>
        )
    }
}
