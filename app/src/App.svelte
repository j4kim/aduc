<script>
	import { Router, Link, Route } from "svelte-navigator"
</script>

<Router>
	<Route path="/">
		<h1>Hello</h1>
		<Link to="/question">question</Link>
	</Route>
	<Route path="/question">
		<h1>Question</h1>
		<Link to="/">une-question.ch</Link>
	</Route>
</Router>

<style>
</style>