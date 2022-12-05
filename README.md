# HorizonRooster
*Laad automatisch jouw eenmalig geselecteerde Horizon College rooster.*<br>
**Vanwege de komst van het intranet ConnectMe zijn koppelingen met het rooster helaas niet meer mogelijk.**

<table>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/Rowan-Mulder/HorizonRooster/main/Github%20bestanden/Screenshots/Screenshot1.png" alt="Screenshot van het resultaat">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/Rowan-Mulder/HorizonRooster/main/Github%20bestanden/Screenshots/Screenshot2.png" alt="Screenshot van het formulier">
      </td>
    </tr>
    <tr>
      <td>
        Jouw automatisch geladen rooster
      </td>
      <td>
        Het eenmalige formulier (Opmaak wordt nog aan gewerkt)
      </td>
    </tr>
  </tbody>
</table>

<br><br><br>
---

## TO-DO:
- Toevoegen van opties (Misschien binnen een dropdown menu)
  - Optie toevoegen om het geselecteerde rooster (Wat opgeslagen wordt in een cookie) te verwijderen om een andere rooster te kiezen
  - Optie toevoegen om een rooster op te slaan als favoriet
- CSS opmaak van het formulier (Bootstrap met o.a. selectpicker?)
- roosterFormulier.php omzetten naar .html (Anders ziet Github het als een 'hack')
- Oplossen van alle 404's
  - Toon voorlopig een custom melding als een rooster niet beschikbaar is
  - Probeer onjuiste oude roosters, die met hetzelfde roosternummer niet hetzelfde rooster laten zien, voorlopig te verbergen
    - Het probleem met oude roosters tijdelijk oplossen door opnieuw de positie binnen de 'classes' array op te zoeken
      - Uiteindelijk een efficiëntere oplossing vinden voor het weergeven van oude roosters van een andere roosterpositie binnen de 'classes' array
