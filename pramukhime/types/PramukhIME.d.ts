declare namespace PramukhIME {
    /**
     * @property code - Key code
     * @property ctrl - Control key flag
     * @property alt - Alt key flag
     */
    interface ToggleKeyOutput {
        code: number;
        ctrl: boolean;
        alt: boolean;
    }
    /**
     * @property language - language name
     * @property kb - keyboard name
     */
    interface LanguageOutput {
        language: string;
        kb: string;
    }
    /**
     * digitInEnglish and advancedRule + advancedRuleValues are mutually exclusive properties. If the one is available, the other one will not be available
     * @property language - Language name
     * @property kb - Keyboard name
     * @property digitInEnglish - Digit in English
     * @property advancedRule - Currently selected advanced rule
     * @property advancedRuleValues - All available advanced rule values
     */
    interface PramukhIndicSettings {
        language: string;
        kb: string;
        digitInEnglish: boolean;
        advancedRule: string;
        advancedRuleValues: string[];
    }
}

/**
 * PramukhIME is a lightweight, highly customizable JavaScript library for typing in Indian languages in any HTML elements like textbox, textarea, iframe or div using 3 lines of code.
It supports Assamese, Bengali, Bodo, Dogri, Gujarati, Hindi, Kannada, Kashmiri, Konkani, Maithili, Malayalam, Manipuri, Marathi (Devanagari + Modi), Meitei, Nepali, Odia, Punjabi, Sanskrit, Santali (Ol Chiki), Sindhi, Sora, Tamil and Telugu languages.
As soon as the library is loaded in the Webpage, it creates pramukhIME global object which will be used for IME functionality.<br>
<pre>&lt;html&gt;<br />&lt;head&gt;<br />    <strong>&lt;script type="text/javascript" src="js/pramukhime.js"&gt;&lt;/script&gt;</strong><br />&lt;/head&gt;<br />&lt;body&gt;<br />    &lt;input type="text" id="first_name"&gt;<br />    &lt;script language="javascript" type="text/javascript"&gt;<br />        <strong>pramukhIME.setLanguage("[LANGUAGE_NAME]", "[KEYBOARD_NAME]"); <br />        pramukhIME.enable();</strong><br />    &lt;/script&gt;<br />&lt;/body&gt;<br />&lt;/html&gt;</pre>
<strong>Features</strong><ul><li>Requires only 3 lines of code to enable typing in Indian languages on any Web page.</li>
<li>Customizable keyboard shortcut to toggle between currently and last selected language.</li>
<li>Provides fine control over choosing HTML element to enable Indian language typing.</li>
<li>Supports multiple desktop and mobile browsers.</li><li>Once the javascript is downloaded into the browser, it works offline and does not need Internet connection</li>
<li>Ideal for HTML based mobile application and websites</li>
<li>For Indian languages, optionally digits can be kept in English and all other text can be converted into the selected language</li>
<li>Enhanced transliteration experience</li>
<li>For Hindi, Kannada and Kashmiri, user can set preference for typing Anusvar or Panchamakshar</li>
</ul>
<br />
<strong>Defaults</strong>
<br />For all languages, DigitInEnglish = false so all the digits will be converted into the selected language
<br /><br />
<table>
<thead><tr><td>Language</td><td>Internal Name</td><td>Code</td><td>Default Typing Rule</td><td>Available Typing Rules</td></tr></thead>
<tbody>
<tr><td>Assamese</td><td>assamese</td><td>AS</td><td></td><td></td></tr>
<tr><td>Bengali</td><td>bengali</td><td>BN</td><td></td><td></td></tr>
<tr><td>Bodo</td><td>bodo</td><td>BO</td><td></td><td></td></tr>
<tr><td>Dogri</td><td>dogri</td><td>DO</td><td></td><td></td></tr>
<tr><td>Gujarati</td><td>gujarati</td><td>GU</td><td></td><td></td></tr>
<tr><td>Hindi</td><td>hindi</td><td>HI</td><td>anusvar</td><td>anusvar, panchamakshar</td></tr>
<tr><td>Kannada</td><td>kannada</td><td>KN</td><td>anusvar</td><td>anusvar, panchamakshar</td></tr>
<tr><td>Kashmiri</td><td>kashmiri</td><td>KS</td><td>anusvar</td><td>anusvar, panchamakshar</td></tr>
<tr><td>Konkani</td><td>konkani</td><td>KO</td><td></td><td></td></tr>
<tr><td>Maithili</td><td>maithili</td><td>MA</td><td></td><td></td></tr>
<tr><td>Malayalam</td><td>malayalam</td><td>ML</td><td></td><td></td></tr>
<tr><td>Manipuri</td><td>manipuri</td><td>MN</td><td></td><td></td></tr>
<tr><td>Marathi</td><td>marathi</td><td>MR</td><td></td><td></td></tr>
<tr><td>Marathi (Modi)</td><td>marathimodi</td><td>MR</td><td></td><td></td></tr>
<tr><td>Meitei</td><td>meitei</td><td>MT</td><td></td><td></td></tr>
<tr><td>Nepali</td><td>nepali</td><td>NE</td><td></td><td></td></tr>
<tr><td>Odia</td><td>odia</td><td>OD</td><td></td><td></td></tr>
<tr><td>Punjabi</td><td>punjabi</td><td>PA</td><td></td><td></td></tr>
<tr><td>Sanskrit</td><td>sanskrit</td><td>SA</td><td></td><td></td></tr>
<tr><td>Santali (Ol Chiki)</td><td>santali</td><td>ST</td><td></td><td></td></tr>
<tr><td>Sindhi</td><td>sindhi</td><td>SD</td><td></td><td></td></tr>
<tr><td>Sora</td><td>sora</td><td>SR</td><td></td><td></td></tr>
<tr><td>Tamil</td><td>tamil</td><td>TA</td><td></td><td></td></tr>
<tr><td>Telugu</td><td>telugu</td><td>TE</td><td></td><td></td></tr>
</tbody>
</table>
<br /><br />
<span class="pro">Note:</span> When you work with API and need to provide keyboard name as input/parameter, use "[KEYBOARD_NAME]" for Indian languages. Use "pramukhime" as keyboard name when dealing with English language.
 */
declare class PramukhIME {
    constructor();
    /**
     * Gets a new PramukhIME object. This object is separate from global pramukhIME object. This object must be used carefully because it may interfere with
     * global object.
     * @returns Returns a new PramukhIME object
     * @pro
     */
    createPramukhIME(): PramukhIME;

    /**
     * Converts the text from English to the selected language. For each call to this function, it will reset the internal state.
     * so calling this function for 'p', 'r', 'a', 'm', 'u', 'k', 'h' and combining the output may yield different
     * result than calling the function for 'pramukh' depending on the selected language/keyboard
     * @param input - English string
     * @returns Converted text
     * @pro
     */
    convert(input: string): string;

    /**
     * Disables PramukhIME from the whole Web page. This method cleans up memory and resets internal state. It does <strong>not</strong> affect current/last selected keyboard/language/settings.
     */
    disable(): void;



    /**
    * Disables PramukhIME from individual HTML elements or whole Web page. This method cleans up memory and resets internal state. It does <strong>not</strong> affect current/last selected keyboard/language/settings.
	  * If the PramukhIME is enabled for the whole page and you want to exclude certain elements, use this function with arguments.
	  * @param {string[]|any[]} elems Element's id / javascript element object for which you want to disable PramukhIME. If not provided, it will disable the PramukhIME from the whole page.
    * @pro
    */
    disable(elements?: string[] | any[]): void;

    
    /**
     * Enables PramukhIME on a Web page. You will be able to type in the selected language on textbox, textarea (or any element with element.isContentEditable = true in PRO version).
     * For textbox and textarea, this library honors the maxlength, disabled and readonly attributes.
     */
    enable(): void;

    /**
       * Enables PramukhIME on a specified HTML element or a Web page. Using this method, you can enable PramukhIME for an element one by one.
       * If you want to enable PramukhIME on the whole webpage, call this function without passing any argument. At the time of page load, you need to decide
       * whether you want to enable pramukhIME for the whole page or on individual elements. When PramukhIME is enabled for the whole page, you will be able to type
       * in the selected language on textbox, textarea and any element with element.isContentEditable = true. This is useful when you are creating elements on-the-fly. You may individually add elements like iframe
       * which has designMode = 'on' to enable the IME functionality. For textbox and textarea, this library honors the maxlength, disabled and readonly attributes.
       * @param {string[]|object[]} elems Array of html element id or dom element object.
       * @pro
       */
    enable(elements?: string[] | any[]): void;


    /**
     * Gets the detailed help file name of the currently selected language.
     * @returns Detailed help html file name
     */
    getHelp(): string;

    /**
     * Gets the detailed help file name of the currently selected language. If urlTemplate is provided,
	   * help file name will be created using the template otherwise the keyboard default help file
	   * name will be returned. urlTemplate supports '{language}', '{kb}', '{lastlanguage}' or '{lastkb}' tokens.
	   * @param {string} urlTemplate    Url Template string containining tokens '{language}', '{kb}', '{lastlanguage}' or '{lastkb}'.
	   * @returns {string} Detailed help html file name
     * @pro
     */
    getHelp(urlTemplate?: string): string;

    /**
     * Gets the help image file name of the selected language and keyboard.
     * @returns Help image file name
     */
    getHelpImage(): string;

    /**
     * Gets the help image file name of the selected language and keyboard. If urlTemplate is provided,
	   * image file name will be created using the template otherwise the keyboard default help image file
	   * name will be returned. urlTemplate supports '{language}', '{kb}', '{lastlanguage}' or '{lastkb}' tokens.
	   * @param {string} urlTemplate    Url Template string containining tokens '{language}', '{kb}', '{lastlanguage}' or '{lastkb}'.
	   * @returns {string} Help image file name
     * @pro
     */
    getHelpImage(urlTemplate?: string): string;

    /**
     * Gets the currently set language/keyboard name.
     */
    getLanguage(): PramukhIME.LanguageOutput;

    /**
     * Gets the currently selected language code.
     */
    getLanguageCode(): string;

    /**
     * Gets the last selected language/keyboard name.
     * @returns Result object
     * @pro
     */
    getLastLanguage(): PramukhIME.LanguageOutput;

    /**
     * Gets the settings for the currently selected language/keyboard name. If the selected language is English, it will return Object.language.
     * If the Indian language is selected, it will provide 2 records in an Array. 0th index element (1st record) contains digitInEnglish property with language:'all'
     * and 1st index element (2nd record) contains advancedRule+advancedRuleValues properties.
     */
    getSetting(): PramukhIME.PramukhIndicSettings[];

    /**
     * Gets the settings for the all the available language/keyboard names except English. 0th index element (1st record) contains digitInEnglish property with language:'all'
     * and all subsequent elements contain advancedRule+advancedRuleValues properties for their respective language.
     */
    getSettings(): PramukhIME.PramukhIndicSettings[];

    /**
     * Gets the shortcut key
     * @pro
     */
    getToggleKey(): PramukhIME.ToggleKeyOutput;

    /**
     * Checks if the currently selected keyboard has help.
     */
    hasHelp(): boolean;

    /**
     * Checks if the currently selected keyboard has settings
     */
    hasSettings(): boolean;

    /**
     * Unsubscribe from "languagechange" or "settingschange" event.
     * @param eventName - It must be "languagechange" or "settingschange"
     * @param handler - Callback method.
     */
    off(eventName: string, handler: (...params: any[]) => any): void;

    /**
     * Subscribe to "languagechange" or "settingschange" event.
     * @param eventName - It must be "languagechange" or "settingschange"
     * @param handler - Callback method.
     */
    on(eventName: string, handler: (...params: any[]) => any): void;

    /**
     * Resets keyboard settings for all the added keyboards.
     * @fires Fires "settingschange" event if the settings are changed for the added keyboard layout
     */
    resetSettings(): void;

    /**
     * Sets the new language so that user will start typing in the provided language using provided keyboard layout.
     * @param languageName - Language name.
     * @param keyboardName - Name of the keyboard layout
     * @fires Fires "languagechange" event if the language you are trying to set the currently selected language
     */
    setLanguage(languageName: string, keyboardName: string): void;

    /**
     * Sets the settings. Setting object contains the language for which settings will be set
     * @param settings - This should be the same object as the keyboard plugin's setSettings method expects.
     */
    setSettings(settings: object[]): void;

    /**
     * Sets the shortcut key to switch between selected language and last selected language. Default value for toggle key is 120 (F9 key).
     * If the user is typing in a text box(or any PramukhIME enabled HTML element) and presses F9 key, user can immediately start
     * typing in English (given the English is the last selected language). Press F9 key to again type in previously selected language.
     * @param key - Key Code in KeyDown event.
     * @param ctrl - Hold down Control key for switching between English and selected language?
     * @param alt - Hold down Alt key for switching between English and selected language?
     * @pro
     */
    setToggleKey(key: number, ctrl: boolean, alt: boolean): void;

    /**
     * Toggles between selected language and last selected language
     * @pro
     */
    toggleLanguage(): void;
}

declare const pramukhIME: PramukhIME;
