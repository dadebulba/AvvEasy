/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    var courses = {
        10027: {
            "10116": "Laurea - Scienze e Tecnologie Biomolecolari - 0516G",
            "10232": "Laurea Magistrale - BIOTECNOLOGIE CELLULARI E MOLECOLARI - 0520H",
            "10616": "Laurea Magistrale - Biologia Quantitativa e Computazionale - 0521H"
        },
        10030: {
            "10168": "Laurea Magistrale - Cognitive Science - Scienze Cognitive - 0708H"
        },
        10019: {
            "10126": "Laurea - Amministrazione Aziendale e Diritto - 0115G",
            "10128": "Laurea - Gestione Aziendale - 0116G",
            "10129": "Laurea - Economia e Management - 0117G",
            "10136": "Laurea Magistrale - International Management - Management Internazionale - 0119H",
            "10176": "Laurea Magistrale - Innovation Management - Management dell'innovazione - 0120H",
            "10178": "Laurea Magistrale - Economics - Economia - 0121H",
            "10179": "Laurea Magistrale - Finanza - 0122H",
            "10185": "Laurea Magistrale - Management - 0123H",
            "10186": "Laurea Magistrale - Management - 0124H",
            "10187": "Laurea Magistrale - Economia e legislazione d'impresa - 0125H",
            "10557": "Laurea Magistrale - Management della sostenibilità e del turismo - 0126H"
        },
        10025: {
            "10113": "Laurea - Fisica - 0513G",
            "10169": "Laurea Magistrale - FISICA - 0518H"
        },
        10021: {
            "10361": "Dottorato - Ingegneria civile, ambientale e meccanica - ICAM",
            "10127": "Laurea - Ingegneria Civile - 0325G",
            "10130": "Laurea - Ingegneria per l'ambiente e il territorio - 0326G",
            "10149": "Laurea Magistrale - Ingegneria Civile - 0331H",
            "10150": "Laurea Magistrale - Ingegneria per l'ambiente e il territorio - 0332H",
            "10437": "Laurea Magistrale - Ingegneria Energetica - 0337H",
            "10175": "Laurea Magistrale Ciclo Unico 5 anni - Ingegneria Edile-Architettura - 0336F",
        },
        10023: {
            "10114": "Laurea - Informatica - 0514G",
            "10133": "Laurea - Ingegneria Elettronica e delle Telecomunicazioni - 0329G",
            "10134": "Laurea - Ingegneria dell'informazione e Organizzazione D'impresa - 0330G",
            "10560": "Laurea - Ingegneria dell'Informazione e delle Comunicazioni - 0338G",
            "10627": "Laurea Magistrale - Ingegneria dell’Informazione e delle Comunicazioni - 0340H",
            "10153": "Laurea Magistrale - Ingegneria delle telecomunicazioni - 0335H",
            "10117": "Laurea Magistrale - INFORMATICA - 0517H"
        },
        10022: {
            "10131": "Laurea - Ingegneria Industriale - 0327G",
            "10151": "Laurea Magistrale - Ingegneria Meccatronica - 0333H",
            "10563": "Laurea Magistrale - Materials and production Engineering - Ingegneria dei materiali e della produzione - 0339H"
        },
        10024: {
            "10155": "Laurea - Filosofia - 0416G",
            "10156": "Laurea - Beni culturali - 0417G",
            "10158": "Laurea - Studi storici e filologico-letterari - 0419G",
            "10438": "Laurea - Lingue moderne - 0427G",
            "10164": "Laurea Magistrale - Letterature euroamericane, traduzione e critica letteraria - 0422H",
            "10165": "Laurea Magistrale - Mediazione linguistica, turismo e culture - 0423H",
            "10166": "Laurea Magistrale - Filologia e critica letteraria - 0424H",
            "10167": "Laurea Magistrale - Filosofia e linguaggi della modernità - 0420H",
            "10233": "Laurea Magistrale - Scienze storiche - 0426H"
        },
        10026: {
            "10115": "Laurea - Matematica - 0515G",
            "10170": "Laurea Magistrale - MATEMATICA - 0519H"
        },
        10029: {
            "10112": "Laurea - Interfacce e Tecnologie della Comunicazione - 0704G",
            "10123": "Laurea - Scienze e Tecniche di Psicologia Cognitiva - 0705G",
            "10124": "Laurea Magistrale - Psicologia - 0707H",
            "10559": "Laurea Magistrale - Human-Computer Interaction - Interazione Persona-Macchina - 0709H"
        },
        10028: {
            "10507": "Master di Secondo Livello - Previsione Sociale - M218",
            "10565": "Laurea - Studi internazionali - 0620G",
            "10624": "Laurea - Servizio sociale - 0622G",
            "10137": "Laurea - Sociologia - 0611G",
            "10138": "Laurea - Studi internazionali - 0612G",
            "10139": "Laurea - Servizio Sociale - 0613G",
            "10234": "Laurea Magistrale - Gestione delle organizzazioni e del territorio - 0618H",
            "10235": "Laurea Magistrale - Metodologia, Organizzazione e Valutazione dei Servizi Sociali - 0619H",
            "10567": "Laurea Magistrale - Sociology and social research - Sociologia e ricerca sociale - 0621H"
        },
        10031: {
            "10177": "Laurea Magistrale - EUROPEAN AND INTERNATIONAL STUDIES - STUDI EUROPEI E INTERNAZIONALI  - 0803H",
            "10615": "Laurea Magistrale - Studi sulla Sicurezza Internazionale - 0804H"
        }
    };

    $(function(){
        $("#departement_select").change(function(){
            $("#courses_select").html("");
            $("#courses_select").append('<option value="0">Tutti</option>');

            var selectedDepartment = $(this).val();
            for(elem in courses[selectedDepartment]){
                var $option = $("<option>");
                $option.attr("value", elem);
                $option.text(courses[selectedDepartment][elem]);


                $("#courses_select").append($option);
            }
        });
    });