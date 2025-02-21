
/**
 * Cập nhật giao diện bộ đếm ngược
 * @param {Object} remainingTime
 */
function updateCountdownView({ days, hours, minutes, seconds }) {
  const daysElement = document.getElementById("days");
  const hoursElement = document.getElementById("hours");
  const minutesElement = document.getElementById("minutes");
  const secondsElement = document.getElementById("seconds");

  daysElement.textContent = formatNumber(days);
  hoursElement.textContent = formatNumber(hours);
  minutesElement.textContent = formatNumber(minutes);
  secondsElement.textContent = formatNumber(seconds);
}

/**
 * Hiển thị thông báo khi hết thời gian
 * @param {string} message
 */
function displaySaleEndedMessage(message) {
  const subtitleElement = document.querySelector(".flash-sale__subtitle");
  if (subtitleElement) {
    subtitleElement.textContent = message;
  }
}

/**
 * Định dạng số
 * @param {number} number
 * @returns {string}
 */
function formatNumber(number) {
  return number.toString().padStart(2, "0");
}

class CountdownTimer {
  constructor(endTime) {
    this.endTime = new Date(endTime).getTime();
    this.interval = null;
  }

  /**
   * Tính toán thời gian còn lại
   * @returns {Object}
   */
  calculateRemainingTime() {
    const now = new Date().getTime();
    const remainingTime = this.endTime - now;

    if (remainingTime <= 0) {
      return { days: 0, hours: 0, minutes: 0, seconds: 0 };
    }

    const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
    const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

    return { days, hours, minutes, seconds };
  }

  /**
   * Bắt đầu bộ đếm ngược
   * @param {Function} callback
   */
  start(callback) {
    this.interval = setInterval(() => {
      const remainingTime = this.calculateRemainingTime(); // Model tính toán thời gian còn lại
      callback(remainingTime); // gọi lại callback, gửi dữ liệu về controller

      if (remainingTime.days === 0 && remainingTime.hours === 0 && remainingTime.minutes === 0 && remainingTime.seconds === 0) {
        clearInterval(this.interval);
      }
    }, 1000);
  }

  /**
   * Dừng bộ đếm ngược
   */
  stop() {
    clearInterval(this.interval);
  }
}

export class CountdownController {
  constructor(endTime, onEndMessage) {
    this.timer = new CountdownTimer(endTime);
    this.onEndMessage = onEndMessage;
  }

  start() {
    // Khởi tạo bộ đếm ngược
    // remainingTime là callback
    this.timer.start((remainingTime) => {
      if (remainingTime <= 0) {
        displaySaleEndedMessage(this.onEndMessage);
        this.timer.stop();
      } else {
        updateCountdownView(remainingTime);
      }
    });
  }
}
