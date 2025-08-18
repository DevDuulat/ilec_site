function phoneInput() {
  return {
    countries: [],
    selectedCode: '',
    phoneNumber: '',

    async init() {
      try {
        const resCountries = await fetch('/countries.json');
        if (!resCountries.ok) throw new Error('Не удалось загрузить countries.json');
        this.countries = (await resCountries.json()).map(c => ({
          ...c,
          flag: this.getFlagEmoji(c.code)
        }));

        const resGeo = await fetch('https://ipinfo.io/json?token=957e68b1a85004');
        if (!resGeo.ok) throw new Error('Не удалось определить страну по IP');
        const geo = await resGeo.json();
    
        const country = this.countries.find(c => c.code === geo.country);
        if (country) this.selectedCode = country.dial_code;

      } catch (e) {
        console.warn('Ошибка загрузки стран или определения IP:', e.message);
      }
    },

    getFlagEmoji(countryCode) {
      return countryCode
        .toUpperCase()
        .replace(/./g, char => String.fromCodePoint(127397 + char.charCodeAt()));
    },

    onlyDigits() {
      this.phoneNumber = this.phoneNumber.replace(/\D/g, '');
    },

    fullPhone() {
      return this.selectedCode + this.phoneNumber;
    }
  }
}
