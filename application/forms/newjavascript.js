$(function()
{
	$('#monthsList li').each(
		function()
		{
			$this = $(this);
			var monthBits = $this.html().split('/');

			$this
				.datePicker(
					{
						createButton:false,
						month:Number(monthBits[0])-1, // JS months start from 0 not 1...
						year:Number(monthBits[1])}
				)
				.bind(
					'click',
					function()
					{
						$(this).dpDisplay();
						this.blur();
						return false;
					}
				)
				.bind(
					'dateSelected',
					function(e, selectedDate, $td)
					{
						Date.format = 'yyyymmdd';
						// alert the URL
						alert('http://www.myURL.com/section/' + selectedDate.asString());
						// reassign the date format back to how you want it.
						Date.format = 'dd/mm/yyyy';
					}
				);
		}
	)
});