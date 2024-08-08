document.addEventListener('DOMContentLoaded', function() {
    // Italy
    document.getElementById('date1').addEventListener('change', function() {
        const selectedDate = this.value;
        // 發送 AJAX 請求以獲取該日期的可用時間段
        fetch(`get_available_times.php?date=${selectedDate}&type=Italy`)
            .then(response => response.json())  // 假設返回 JSON 數據
            .then(data => {
                const timeSelect = document.getElementById('time1');
                timeSelect.innerHTML = '';  // 清空當前的選項

                // 遍歷返回的時間數組並創建選項
                data.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });

    //China
    document.getElementById('date2').addEventListener('change', function() {
        const selectedDate = this.value;
        // 發送 AJAX 請求以獲取該日期的可用時間段
        fetch(`get_available_times.php?date=${selectedDate}&type=China`)
            .then(response => response.json())  // 假設返回 JSON 數據
            .then(data => {
                const timeSelect = document.getElementById('time2');
                timeSelect.innerHTML = '';  // 清空當前的選項

                // 遍歷返回的時間數組並創建選項
                data.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });

    //France
    document.getElementById('france-date').addEventListener('change', function() {
        const selectedDate = this.value;
        // 發送 AJAX 請求以獲取該日期的可用時間段
        fetch(`get_available_times.php?date=${selectedDate}&type=France`)
            .then(response => response.json())  // 假設返回 JSON 數據
            .then(data => {
                const timeSelect = document.getElementById('france-time');
                timeSelect.innerHTML = '';  // 清空當前的選項

                // 遍歷返回的時間數組並創建選項
                data.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });
});