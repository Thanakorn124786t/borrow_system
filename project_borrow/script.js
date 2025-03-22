document.querySelectorAll('.borrow-btn').forEach(button => {
    button.addEventListener('click', function() {
        const equipmentId = this.dataset.id;

        fetch('borrow.php?id=' + equipmentId)
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Equipment has been borrowed!');
                    location.reload();
                } else {
                    alert('An error occurred.');
                }
            });
    });
});

function updateEquipmentLists() {
    // ดึงข้อมูลอุปกรณ์ที่ยืมแล้วและต้องคืนจากฐานข้อมูล
    fetch('get_borrowed.php')
        .then(response => response.json())
        .then(data => {
            // แสดงรายการอุปกรณ์ที่ยืมแล้ว
            const borrowedList = document.getElementById('borrowed-list');
            borrowedList.innerHTML = '';
            data.borrowed.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.name;
                borrowedList.appendChild(li);
            });

            // แสดงรายการอุปกรณ์ที่ต้องคืน
            const returningList = document.getElementById('returning-list');
            returningList.innerHTML = '';
            data.returning.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.name;
                returningList.appendChild(li);
            });
        });
}

// เรียกใช้ update เมื่อโหลดหน้า
window.onload = updateEquipmentLists;
