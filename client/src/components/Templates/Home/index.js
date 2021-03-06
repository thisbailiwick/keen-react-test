import React, { Component } from 'react';

import ContentBlock from '../../Utilities/ContentBlock';

import './Home.css';

class Home extends Component {

	render() {

		if (this.props.data) {

			const data = this.props.data;

			return (
				<article className="home">
					<h1>{data.title.rendered}</h1>
					<ContentBlock content={data.content.rendered} />
				</article>
			);
		}

		return null;
	};
};

export default Home;