document.write(`
<input type="checkbox" class="custom-control-input" id="darkSwitch">
<label class="custom-control-label" for="darkSwitch">Dark Mode</label>
`);

const darkSwitch = document.getElementById('darkSwitch');

darkSwitch.checked = getTheme() === 'dark';
darkSwitch.onchange = () => {
	setTheme(darkSwitch.checked ? 'dark' : 'light');
};

themeChangeHandlers.push(theme => darkSwitch.checked = theme === 'dark');
